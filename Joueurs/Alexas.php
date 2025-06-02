<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: compte.php");
    exit;
}

// Connexion à la base de données
$host = 'localhost';
$dbname = 'Rasengan';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erreur de connexion : " . $conn->connect_error);
}

$user_id = 3;

// Récupérer le pseudo d'Alexas
$sql_pseudo = "SELECT pseudo FROM utilisateurs WHERE id = ?";
$stmt_pseudo = $conn->prepare($sql_pseudo);
$stmt_pseudo->bind_param("i", $user_id);
$stmt_pseudo->execute();
$result_pseudo = $stmt_pseudo->get_result();
if ($result_pseudo->num_rows === 0) {
    die("Utilisateur Alexas non trouvé.");
}
$target_user = $result_pseudo->fetch_assoc();
$target_pseudo = $target_user['pseudo'];
$stmt_pseudo->close();

// Récupérer les cartes d'Alexas avec tri
$sql = "
    SELECT ca.id, ca.nom, ca.anime, ca.image_path, ca.id_rarete, r.libelle AS rarete, uc.quantite
    FROM utilisateurs_cartes_animes uc
    JOIN cartes_animes ca ON uc.carte_id = ca.id
    JOIN raretes r ON ca.id_rarete = r.id_rarete
    WHERE uc.user_id = ?
    ORDER BY ca.id_rarete DESC, ca.id ASC";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// Préparer un tableau pour stocker les propriétaires de chaque carte
$owners = [];
$totals = [];
while ($row = $result->fetch_assoc()) {
    $carte_id = $row['id'];
    $sql_owners = "
        SELECT u.pseudo, uc.quantite
        FROM utilisateurs_cartes_animes uc
        JOIN utilisateurs u ON uc.user_id = u.id
        WHERE uc.carte_id = ?";
    $stmt_owners = $conn->prepare($sql_owners);
    $stmt_owners->bind_param("i", $carte_id);
    $stmt_owners->execute();
    $result_owners = $stmt_owners->get_result();

    $owner_list = [];
    $total = 0;
    while ($owner = $result_owners->fetch_assoc()) {
        $owner_list[] = $owner['pseudo'] . " (" . $owner['quantite'] . ")";
        $total += $owner['quantite'];
    }
    $owners[$carte_id] = $owner_list;
    $totals[$carte_id] = $total;
    $stmt_owners->close();
}

// Réinitialiser le curseur pour réutiliser $result
$result->data_seek(0);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/styles.css"/>
    <link rel="stylesheet" href="../css/header.css"/>
    <link rel="stylesheet" href="../css/footer.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"/>
    <title>Rasengan - <?= htmlspecialchars($target_pseudo) ?></title>
    <style>
        .card-content p {
            font-size: 0.9em;
            color: #555;
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="../index.php" class="logo">RASENGAN</a>
            <div class="nav-links">
                <ul>
                    <li><a href="../index.php">Accueil</a></li>
                    <li><a href="../catalogue.php">Catalogue</a></li>
                    <li class="active"><a href="../collection.php">Collection des joueurs</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
                        <li><span class="welcome-message">Bienvenue, <?= htmlspecialchars($_SESSION['pseudo']) ?>!</span></li>
                        <li><a href="../logout.php">Déconnexion</a></li>
                    <?php else: ?>
                        <li><a href="../compte.php">Connexion</a></li>
                        <li><a href="../inscription.php">Inscription</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <img src="../Images/burger.png" alt="Menu Hamburger" class="menu-burger"/>
        </nav>
    </header>

    <main class="main-collec-responsive">
        <h2 id="Catalogue">Chez <?= htmlspecialchars($target_pseudo) ?></h2>
        <input type="text" id="searchbar" placeholder="Recherche un personnage, un animé, une série ou un film"/>

        <div class="filters-container">
            <div class="filters">
                <div class="filter-group">
                    <label for="sectionFilter">📚 Section</label>
                    <select id="sectionFilter">
                        <option value="all">Toutes les sections</option>
                        <option value="anime">Animés</option>
                        <option value="film">Films & séries</option>
                    </select>
                </div>
    
                <div class="filter-group">
                    <label for="rarityFilter">🌟 Rareté</label>
                    <select id="rarityFilter">
                        <option value="">Toutes les raretés</option>
                        <option value="Events">Événements</option>
                        <option value="Mythiques">Mythiques</option>
                        <option value="Legendaires">Légendaires</option>
                        <option value="Epiques">Épiques</option>
                        <option value="Rares">Rares</option>
                        <option value="Communes">Communes</option>
                    </select>
                </div>
            </div>
        </div>
        
        <div class="catalogue2">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $carte_id = $row['id'];
                    echo '<div class="card" data-anime="' . htmlspecialchars($row['anime'] ?? '') . '">';
                    echo '<img src="/Rasengan/' . htmlspecialchars($row['image_path']) . '" alt="' . htmlspecialchars($row['nom']) . '">';
                    echo '<div class="card-content">';
                    echo '<h2 class="card-title">' . htmlspecialchars($row['quantite']) . '</h2>';
                    echo '</div>';
                    echo '</div>';
                }
            } else {
                echo '<p>' . htmlspecialchars($target_pseudo) . ' n\'a aucune carte dans son inventaire.</p>';
            }
            $stmt->close();
            $conn->close();
            ?>
        </div>
    </main>
    <footer>
        <p>© 2024 - Rasengan</p>
        <a href="https://discord.gg/kyfQZbnkjy" target="_blank">Rejoindre</a>
    </footer>
    <script src="../js/main.js"></script>
</body>
</html>