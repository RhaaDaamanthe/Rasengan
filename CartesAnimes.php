<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: compte.php");
    exit;
}

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = 'localhost';
$dbname = 'rasengan';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

$sql = "SELECT ca.id, ca.nom, a.nom AS anime, ca.id_rarete, ca.image_path, ca.description, r.libelle AS rarete_libelle
        FROM cartes_animes ca
        JOIN raretes r ON ca.id_rarete = r.id_rarete
        LEFT JOIN animes a ON ca.id_anime = a.id
        ORDER BY ca.id_rarete DESC, ca.id ASC"; // Tri par rareté décroissante, puis ID croissant
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Erreur de préparation de la requête principale : " . $conn->error);
}
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/styles.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="stylesheet" href="./css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <title>Rasengan - Collection de Cartes</title>
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
                    <li><span class="welcome-message">Bienvenue, <?= htmlspecialchars($_SESSION['pseudo']) ?>!</span></li>
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
    <input type="text" id="searchbar" placeholder="Recherche un personnage ou un animé">

    <div class="filters-container">
        <div class="filters">
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
                $idCarte = $row['id'];
                $idRarete = $row['id_rarete'];
                $nom = htmlspecialchars($row['nom']);
                $anime = htmlspecialchars($row['anime'] ?? 'Animé');
                $image = htmlspecialchars($row['image_path']);
                $description = htmlspecialchars($row['description'] ?? '');
                $infoSup = '';

                if (in_array($idRarete, [6, 5, 4])) {
                    $stmt2 = $conn->prepare("SELECT u.pseudo FROM utilisateurs u JOIN utilisateurs_cartes_animes uc ON u.id = uc.user_id WHERE uc.carte_id = ? LIMIT 1");
                    if (!$stmt2) {
                        die("Erreur de préparation (rarete 6-4) : " . $conn->error);
                    }
                    $stmt2->bind_param("i", $idCarte);
                    $stmt2->execute();
                    $res2 = $stmt2->get_result();
                    $owner = $res2->fetch_assoc();
                    $infoSup = $owner ? htmlspecialchars($owner['pseudo']) : 'Aucun';
                    $stmt2->close();
                }
                elseif (in_array($idRarete, [3, 2, 1])) {
                    $stmt3 = $conn->prepare("SELECT SUM(quantite) as total FROM utilisateurs_cartes_animes WHERE carte_id = ?");
                    if (!$stmt3) {
                        die("Erreur de préparation (rarete 3-1) : " . $conn->error);
                    }
                    $stmt3->bind_param("i", $idCarte);
                    $stmt3->execute();
                    $res3 = $stmt3->get_result();
                    $total = $res3->fetch_assoc()['total'] ?? 0;
                    $infoSup = 'Prises : ' . $total;
                    if ($idRarete == 3) $infoSup .= '/2';
                    elseif ($idRarete == 1 || $idRarete == 2) $infoSup .= '/3';
                    $stmt3->close();

                    $stmt4 = $conn->prepare("SELECT u.pseudo FROM utilisateurs u JOIN utilisateurs_cartes_animes uc ON u.id = uc.user_id WHERE uc.carte_id = ?");
                    if (!$stmt4) {
                        die("Erreur de préparation (propriétaires) : " . $conn->error);
                    }
                    $stmt4->bind_param("i", $idCarte);
                    $stmt4->execute();
                    $res4 = $stmt4->get_result();
                    $owners = [];
                    while ($row4 = $res4->fetch_assoc()) {
                        $owners[] = htmlspecialchars($row4['pseudo']);
                    }
                    $ownersList = implode(', ', $owners);
                    $stmt4->close();
                }

                echo '<div class="card" data-anime="' . $anime . '" data-rarete="' . $idRarete . '">';
                echo '<img src="/Rasengan/' . $image . '" alt="' . $nom . '">';
                echo '<div class="card-content">';
                echo '<h2 class="card-title">' . $infoSup . '</h2>';
                if (in_array($idRarete, [3, 2, 1]) && !empty($ownersList)) {
                    echo '<div class="owners-list"><p>Propriétaires : ' . $ownersList . '</p></div>';
                }
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p>Aucune carte trouvée dans la base de données.</p>';
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
<script src="./js/main.js"></script>
<script src="./js/utilisateurs_cartes.js"></script>
</body>
</html>