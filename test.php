<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    error_log("Redirection vers compte.php : utilisateur non connecté");
    header("Location: compte.php");
    exit;
}

// Vérifier si l'utilisateur est administrateur
$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
error_log("Valeur de is_admin dans test.php : " . ($is_admin ? 'true' : 'false'));

if (!$is_admin) {
    error_log("Utilisateur " . ($_SESSION['pseudo'] ?? 'inconnu') . " n'est pas administrateur.");
}

// Initialiser le message de session
$message = $_SESSION['message'] ?? '';
unset($_SESSION['message']);

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=localhost;dbname=rasengan_db", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Erreur de connexion à la base : " . $e->getMessage());
    die("Une erreur est survenue. Consultez les logs.");
}

// Gérer la requête AJAX pour les cartes filtrées
if (isset($_GET['action']) && $_GET['action'] === 'get_cards') {
    $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING) ?? '';
    $rarete = filter_input(INPUT_GET, 'rarete', FILTER_VALIDATE_INT) ?? 0;
    $anime = filter_input(INPUT_GET, 'anime', FILTER_SANITIZE_STRING) ?? '';

    if ($type === 'anime') {
        $query = "
            SELECT id, nom, anime 
            FROM cartes_animes 
            WHERE 1=1";
        $params = [];
        if (!empty($anime)) {
            $query .= " AND anime = :anime";
            $params['anime'] = $anime;
        }
        if ($rarete > 0) {
            $query .= " AND id_rarete = :rarete";
            $params['rarete'] = $rarete;
        }
        $query .= " ORDER BY nom ASC";
    } elseif ($type === 'film') {
        $query = "
            SELECT id, nom, film 
            FROM cartes_films 
            WHERE 1=1";
        $params = [];
        if (!empty($anime)) {
            $query .= " AND film = :anime";
            $params['anime'] = $anime;
        }
        if ($rarete > 0) {
            $query .= " AND id_rarete = :rarete";
            $params['rarete'] = $rarete;
        }
        $query .= " ORDER BY nom ASC";
    } else {
        http_response_code(400);
        echo json_encode(['error' => 'Type invalide']);
        exit;
    }

    try {
        $stmt = $pdo->prepare($query);
        $stmt->execute($params);
        $cartes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        header('Content-Type: application/json');
        echo json_encode($cartes);
    } catch (PDOException $e) {
        error_log("Erreur lors de la récupération des cartes : " . $e->getMessage());
        http_response_code(500);
        echo json_encode(['error' => 'Erreur serveur']);
    }
    exit;
}

// Définir les classes
class Rarete {
    private int $id;
    private string $libelle;
    private int $quantiteMax;

    public function __construct(int $id, string $libelle, int $quantiteMax) {
        $this->id = $id;
        $this->libelle = $libelle;
        $this->quantiteMax = $quantiteMax;
    }

    public function getId(): int { return $this->id; }
    public function getLibelle(): string { return $this->libelle; }
    public function getQuantiteMax(): int { return $this->quantiteMax; }
}

class CarteAnime {
    private int $id;
    private string $nom;
    private string $anime;
    private Rarete $rarete;
    private string $imagePath;
    private ?string $description;
    private ?string $proprietaire;
    private int $quantiteActuelle;

    public function __construct(
        int $id, string $nom, string $anime, Rarete $rarete,
        string $imagePath, ?string $description, ?string $proprietaire, int $quantiteActuelle = 0
    ) {
        $this->id = $id;
        $this->nom = $nom;
        $this->anime = $anime;
        $this->rarete = $rarete;
        $this->imagePath = $imagePath;
        $this->description = $description;
        $this->proprietaire = $proprietaire;
        $this->quantiteActuelle = $quantiteActuelle;
    }

    public function getId(): int { return $this->id; }
    public function getNom(): string { return $this->nom; }
    public function getAnime(): string { return $this->anime; }
    public function getRarete(): Rarete { return $this->rarete; }
    public function getImagePath(): string { return $this->imagePath; }
    public function getDescription(): ?string { return $this->description; }
    public function getQuantiteActuelle(): int { return $this->quantiteActuelle; }
}

class CarteAnimeDAO {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAll(): array {
        $stmt = $this->pdo->prepare("
            SELECT ca.*, r.id_rarete AS rarete_id, r.libelle, r.quantite AS quantite_max
            FROM cartes_animes ca
            JOIN raretes r ON ca.id_rarete = r.id_rarete
        ");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $cartes = [];
        foreach ($result as $row) {
            $rarete = new Rarete($row['rarete_id'], $row['libelle'], $row['quantite_max']);
            $cartes[] = new CarteAnime(
                $row['id'],
                $row['nom'],
                $row['anime'],
                $rarete,
                $row['image_path'],
                $row['description'] ?? null,
                null,
                0
            );
        }
        return $cartes;
    }

    public function getAllRaretes(): array {
        $stmt = $this->pdo->prepare("SELECT id_rarete, libelle, quantite FROM raretes ORDER BY id_rarete");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById(int $id): ?CarteAnime {
        $stmt = $this->pdo->prepare("
            SELECT ca.*, r.id_rarete AS rarete_id, r.libelle, r.quantite AS quantite_max
            FROM cartes_animes ca
            JOIN raretes r ON ca.id_rarete = r.id_rarete
            WHERE ca.id = :id
        ");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $rarete = new Rarete($row['rarete_id'], $row['libelle'], $row['quantite_max']);
            return new CarteAnime(
                $row['id'],
                $row['nom'],
                $row['anime'],
                $rarete,
                $row['image_path'],
                $row['description'] ?? null,
                null,
                0
            );
        }
        return null;
    }

    public function insert(CarteAnime $carte): bool {
        $stmt = $this->pdo->prepare("
            INSERT INTO cartes_animes (nom, anime, id_rarete, image_path, description)
            VALUES (:nom, :anime, :id_rarete, :image_path, :description)
        ");
        return $stmt->execute([
            'nom' => $carte->getNom(),
            'anime' => $carte->getAnime(),
            'id_rarete' => $carte->getRarete()->getId(),
            'image_path' => $carte->getImagePath(),
            'description' => $carte->getDescription()
        ]);
    }
}

// Récupérer les utilisateurs
try {
    $stmt = $pdo->prepare("SELECT id, pseudo FROM utilisateurs ORDER BY pseudo ASC");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Erreur lors de la récupération des utilisateurs : " . $e->getMessage());
    $users = [];
}

// Récupérer les animés et films distincts
try {
    $stmt = $pdo->prepare("SELECT DISTINCT LOWER(TRIM(anime)) AS anime FROM cartes_animes ORDER BY anime ASC");
    $stmt->execute();
    $animes = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    error_log("Erreur lors de la récupération des animés : " . $e->getMessage());
    $animes = [];
}

try {
    $stmt = $pdo->prepare("SELECT DISTINCT LOWER(TRIM(film)) AS film FROM cartes_films ORDER BY film ASC");
    $stmt->execute();
    $films = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    error_log("Erreur lors de la récupération des films : " . $e->getMessage());
    $films = [];
}

// Initialiser le DAO
$carteAnimeDAO = new CarteAnimeDAO($pdo);
$raretes = $carteAnimeDAO->getAllRaretes();

// Mapper les raretés aux sous-dossiers
$rareteToFolder = [
    1 => 'Communes',
    2 => 'Rares',
    3 => 'Epiques',
    4 => 'Legendaires',
    5 => 'Mythiques',
    6 => 'Events'
];

// Traitement du formulaire (ajout ou gestion d'inventaire)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && $is_admin) {
    if (isset($_POST['action']) && in_array($_POST['action'], ['give', 'remove'])) {
        // Gestion de l'inventaire
        $user_id = filter_input(INPUT_POST, 'userId', FILTER_VALIDATE_INT) ?? 0;
        $card_id = filter_input(INPUT_POST, 'cardId', FILTER_VALIDATE_INT) ?? 0;
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT) ?? 1;
        $card_type = filter_input(INPUT_POST, 'cardType', FILTER_SANITIZE_STRING) ?? '';
        $action = $_POST['action'];

        if ($user_id <= 0 || $card_id <= 0 || $quantity <= 0 || !in_array($card_type, ['anime', 'film'])) {
            $_SESSION['message'] = "<p style='color:red;'>Erreur : Données invalides.</p>";
            header("Location: test.php");
            exit;
        }

        // Déterminer la table à utiliser
        $table = $card_type === 'anime' ? 'utilisateurs_cartes_animes' : 'utilisateurs_cartes_films';
        $carte_table = $card_type === 'anime' ? 'cartes_animes' : 'cartes_films';
        $carte_field = $card_type === 'anime' ? 'anime' : 'film';

        // Vérifier la rareté et la limite
        $stmt = $pdo->prepare("
            SELECT ca.id_rarete, r.quantite AS quantite_max
            FROM $carte_table ca
            JOIN raretes r ON ca.id_rarete = r.id_rarete
            WHERE ca.id = :card_id
        ");
        $stmt->execute(['card_id' => $card_id]);
        $card_data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$card_data) {
            $_SESSION['message'] = "<p style='color:red;'>Erreur : Carte non trouvée.</p>";
            header("Location: test.php");
            exit;
        }
        $quantite_max = $card_data['quantite_max'];

        // Calculer quantite_attribuee et quantite_restante
        $stmt = $pdo->prepare("
            SELECT COALESCE(SUM(quantite), 0) AS total
            FROM $table
            WHERE carte_id = :card_id
        ");
        $stmt->execute(['card_id' => $card_id]);
        $quantite_attribuee = (int)($stmt->fetch(PDO::FETCH_ASSOC)['total'] ?? 0);
        $quantite_restante = $quantite_max - $quantite_attribuee;

        // Vérifier la quantité actuelle du joueur
        $stmt = $pdo->prepare("
            SELECT quantite
            FROM $table
            WHERE user_id = :user_id AND carte_id = :card_id
        ");
        $stmt->execute(['user_id' => $user_id, 'card_id' => $card_id]);
        $current_quantity = (int)($stmt->fetch(PDO::FETCH_ASSOC)['quantite'] ?? 0);

        if ($action === 'give') {
            if ($quantity > $quantite_restante) {
                $_SESSION['message'] = "<p style='color:red;'>Erreur : Pas assez de cartes disponibles (restant : $quantite_restante).</p>";
                header("Location: test.php");
                exit;
            }

            if ($current_quantity > 0) {
                $stmt = $pdo->prepare("
                    UPDATE $table
                    SET quantite = quantite + :quantity
                    WHERE user_id = :user_id AND carte_id = :card_id
                ");
            } else {
                $stmt = $pdo->prepare("
                    INSERT INTO $table (user_id, carte_id, quantite)
                    VALUES (:user_id, :card_id, :quantity)
                ");
            }
            $stmt->execute([
                'user_id' => $user_id,
                'card_id' => $card_id,
                'quantity' => $quantity
            ]);
            $_SESSION['message'] = "<p style='color:green;'>Carte donnée avec succès !</p>";
        } elseif ($action === 'remove') {
            if ($current_quantity < $quantity) {
                $_SESSION['message'] = "<p style='color:red;'>Erreur : Le joueur n'a pas assez de cartes.</p>";
                header("Location: test.php");
                exit;
            }

            $new_quantity = $current_quantity - $quantity;
            if ($new_quantity > 0) {
                $stmt = $pdo->prepare("
                    UPDATE $table
                    SET quantite = :new_quantity
                    WHERE user_id = :user_id AND carte_id = :card_id
                ");
                $stmt->execute([
                    'user_id' => $user_id,
                    'card_id' => $card_id,
                    'new_quantity' => $new_quantity
                ]);
            } else {
                $stmt = $pdo->prepare("
                    DELETE FROM $table
                    WHERE user_id = :user_id AND carte_id = :card_id
                ");
                $stmt->execute([
                    'user_id' => $user_id,
                    'card_id' => $card_id
                ]);
            }
            $_SESSION['message'] = "<p style='color:green;'>Carte enlevée avec succès !</p>";
        }
    } else {
        // Traitement de l'ajout de carte
        $nom = filter_input(INPUT_POST, 'cardName', FILTER_SANITIZE_STRING) ?? '';
        $type = filter_input(INPUT_POST, 'cardType', FILTER_SANITIZE_STRING) ?? '';
        $anime = filter_input(INPUT_POST, 'cardAnime', FILTER_SANITIZE_STRING) ?? '';
        $newAnime = filter_input(INPUT_POST, 'newAnime', FILTER_SANITIZE_STRING) ?? '';
        $id_rarete = filter_input(INPUT_POST, 'cardRarete', FILTER_VALIDATE_INT) ?? 0;
        $description = filter_input(INPUT_POST, 'cardDescription', FILTER_SANITIZE_STRING) ?? null;

        if ($anime === 'new' && !empty($newAnime)) {
            $anime = $newAnime;
        }

        if (!in_array($type, ['anime', 'film'])) {
            $_SESSION['message'] = "<p style='color:red;'>Erreur : Type de carte invalide.</p>";
            header("Location: test.php");
            exit;
        }

        $stmt = $pdo->prepare("SELECT libelle, quantite FROM raretes WHERE id_rarete = :id_rarete");
        $stmt->execute(['id_rarete' => $id_rarete]);
        $rareteData = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$rareteData) {
            $_SESSION['message'] = "<p style='color:red;'>Erreur : Rareté invalide.</p>";
            header("Location: test.php");
            exit;
        }
        $rareteLibelle = $rareteData['libelle'];
        $quantiteMax = $rareteData['quantite'];
        $rarete = new Rarete($id_rarete, $rareteLibelle, $quantiteMax);

        $folder = $rareteToFolder[$id_rarete] ?? 'Communes';
        $imagePath = "Images/Cartes/" . ($type === 'film' ? 'Films_' : '') . "$folder/";
        if (isset($_FILES['cardImage']) && $_FILES['cardImage']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = __DIR__ . "/Images/Cartes/" . ($type === 'film' ? 'Films_' : '') . "$folder/";
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0755, true);
            }
            $imageName = uniqid() . '_' . basename($_FILES['cardImage']['name']);
            $targetFile = $uploadDir . $imageName;
            if (move_uploaded_file($_FILES['cardImage']['tmp_name'], $targetFile)) {
                $imagePath = "Images/Cartes/" . ($type === 'film' ? 'Films_' : '') . "$folder/$imageName";
            } else {
                $_SESSION['message'] = "<p style='color:red;'>Erreur lors du téléchargement de l'image.</p>";
                header("Location: test.php");
                exit;
            }
        }

        $table = $type === 'anime' ? 'cartes_animes' : 'cartes_films';
        $field = $type === 'anime' ? 'anime' : 'film';
        $stmt = $pdo->prepare("
            SELECT id FROM $table 
            WHERE nom = :nom AND $field = :anime AND id_rarete = :id_rarete
        ");
        $stmt->execute(['nom' => $nom, 'anime' => $anime, 'id_rarete' => $id_rarete]);
        if ($stmt->fetch(PDO::FETCH_ASSOC)) {
            $_SESSION['message'] = "<p style='color:red;'>Erreur : Une carte identique existe déjà.</p>";
            header("Location: test.php");
            exit;
        }

        $stmt = $pdo->prepare("
            INSERT INTO $table (nom, $field, id_rarete, image_path, description)
            VALUES (:nom, :anime, :id_rarete, :image_path, :description)
        ");
        if ($stmt->execute([
            'nom' => $nom,
            'anime' => $anime,
            'id_rarete' => $id_rarete,
            'image_path' => $imagePath,
            'description' => $description
        ])) {
            $_SESSION['message'] = "<p style='color:green;'>Carte ajoutée avec succès !</p>";
        } else {
            $_SESSION['message'] = "<p style='color:red;'>Erreur lors de l'ajout de la carte.</p>";
        }
    }
    header("Location: test.php");
    exit;
}

// Charger les cartes pour le formulaire d'ajout
$cartes = $carteAnimeDAO->getAll();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/catalogue.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Rasengan - Gestion des cartes</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="index.php" class="logo">RASENGAN</a>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li class="active"><a href="catalogue.php">Catalogue</a></li>
                    <li><a href="collection.php">Collection des joueurs</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><span class="welcome-message">Bienvenue, <?= htmlspecialchars($_SESSION['pseudo'], ENT_QUOTES, 'UTF-8') ?>!</span></li>
                        <li><a href="logout.php">Déconnexion</a></li>
                    <?php else: ?>
                        <li><a href="compte.php">Connexion</a></li>
                        <li><a href="inscription.php">Inscription</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <img src="./Images/burger.png" alt="Menu Hamburger" class="menu-burger">
        </nav>
    </header>

    <main>
        <?php if ($message): ?>
            <div class="message"><?php echo $message; ?></div>
        <?php endif; ?>
        <h1>Gestion des cartes</h1>
        <?php if ($is_admin): ?>
            <div class="admin-panel active" id="adminPanel">
                <h3>Interface Administrateur</h3>
                <form id="addCardForm" method="post" enctype="multipart/form-data">
                    <h4>Ajouter une carte</h4>
                    <div class="form-group">
                        <label for="cardName">Personnage :</label>
                        <input type="text" id="cardName" name="cardName" required>
                    </div>
                    <div class="form-group">
                        <label for="cardType">Type :</label>
                        <select id="cardType" name="cardType" required>
                            <option value="">Sélectionnez un type</option>
                            <option value="anime">Animé</option>
                            <option value="film">Film/Série</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cardAnime">Animé/Film :</label>
                        <select id="cardAnime" name="cardAnime" required>
                            <option value="">Sélectionnez un type d'abord</option>
                        </select>
                        <input type="text" id="newAnimeInput" name="newAnime" style="display:none; margin-top: 10px;" placeholder="Entrez un nouvel animé/film">
                    </div>
                    <div class="form-group">
                        <label for="cardRarete">Rareté :</label>
                        <select id="cardRarete" name="cardRarete" required>
                            <?php foreach ($raretes as $rarete): ?>
                                <option value="<?= htmlspecialchars($rarete['id_rarete'], ENT_QUOTES, 'UTF-8') ?>">
                                    <?= htmlspecialchars($rarete['libelle'], ENT_QUOTES, 'UTF-8') ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="cardImage">Image :</label>
                        <input type="file" id="cardImage" name="cardImage" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="cardDescription">Description :</label>
                        <textarea id="cardDescription" name="cardDescription" rows="1"></textarea>
                    </div>
                    <button type="submit">Ajouter</button>
                </form>

                <form id="editCardForm" method="post">
                    <h4>Gérer l'inventaire d'un joueur</h4>
                    <div class="form-group">
                        <label for="userId">Joueur :</label>
                        <select id="userId" name="userId" required>
                            <option value="">Sélectionnez un joueur</option>
                            <?php foreach ($users as $user): ?>
                                <option value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>">
                                    <?= htmlspecialchars($user['pseudo'], ENT_QUOTES, 'UTF-8') ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editCardType">Type :</label>
                        <select id="editCardType" name="cardType" required>
                            <option value="">Sélectionnez un type</option>
                            <option value="anime">Animé</option>
                            <option value="film">Film/Série</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editCardRarete">Rareté :</label>
                        <select id="editCardRarete" name="cardRarete" required>
                            <option value="">Sélectionnez une rareté</option>
                            <?php foreach ($raretes as $rarete): ?>
                                <option value="<?= htmlspecialchars($rarete['id_rarete'], ENT_QUOTES, 'UTF-8') ?>">
                                    <?= htmlspecialchars($rarete['libelle'], ENT_QUOTES, 'UTF-8') ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editCardAnime">Animé/Film :</label>
                        <select id="editCardAnime" name="cardAnime" required>
                            <option value="">Sélectionnez un type d'abord</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="editCardSelect">Carte :</label>
                        <select id="editCardSelect" name="cardId" required>
                            <option value="">Sélectionnez les filtres ci-dessus</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantité :</label>
                        <input type="number" id="quantity" name="quantity" min="1" value="1" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="action" value="give">Donner</button>
                        <button type="submit" name="action" value="remove">Enlever</button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
    </main>
    <footer>
        <p>© 2025 - Rasengan</p>
        <a href="https://discord.gg/kyfQZbnkjy" target="_blank">Rejoindre</a>
    </footer>
    <script>
        const animes = <?php echo json_encode($animes); ?>;
        const films = <?php echo json_encode($films); ?>;
    </script>
    <script src="./js/import_cartes.js"></script>
</body>
</html>