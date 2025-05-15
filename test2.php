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
$dbname = 'rasengan_db';
$username = 'root';
$password = '';
$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Échec de la connexion : " . htmlspecialchars($conn->connect_error));
}

$sql = "
    SELECT ca.id, ca.nom, ca.anime, ca.id_rarete, ca.image_path, ca.description, r.libelle AS rarete_libelle
    FROM cartes_animes ca
    JOIN raretes r ON ca.id_rarete = r.id_rarete
    ORDER BY 
        ca.id ASC, 
        CASE ca.id_rarete 
            WHEN 6 THEN 1
            WHEN 5 THEN 2
            WHEN 4 THEN 3
            WHEN 3 THEN 4
            WHEN 2 THEN 5
            WHEN 1 THEN 6
            ELSE 7 
        END";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/header.css"/>
    <link rel="stylesheet" href="./css/footer.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"/>
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
        <img src="./Images/burger.png" alt="Menu Hamburger" class="menu-burger"/>
    </nav>
</header>

<main>
    <input type="text" id="searchbar" placeholder="Recherche un personnage ou un animé"/>

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
                $anime = htmlspecialchars($row['anime']);
                $image = htmlspecialchars($row['image_path']);
                $description = htmlspecialchars($row['description']);
                $infoSup = '';

                if (in_array($idRarete, [6, 5, 4])) {
                    $stmt2 = $conn->prepare("SELECT user_id FROM utilisateurs_cartes_animes WHERE carte_id = ?");
                    $stmt2->bind_param("i", $idCarte);
                    $stmt2->execute();
                    $res2 = $stmt2->get_result();
                    $users = [];
                    while ($row2 = $res2->fetch_assoc()) {
                        $users[] = $row2['user_id'];
                    }
                    $pseudos = [];
                    if (!empty($users)) {
                        $placeholders = implode(',', array_fill(0, count($users), '?'));
                        $stmt3 = $conn->prepare("SELECT pseudo FROM utilisateurs WHERE id IN ($placeholders)");
                        $stmt3->bind_param(str_repeat('i', count($users)), ...$users);
                        $stmt3->execute();
                        $res3 = $stmt3->get_result();
                        while ($row3 = $res3->fetch_assoc()) {
                            $pseudos[] = htmlspecialchars($row3['pseudo']);
                        }
                        $stmt3->close();
                    }
                    $infoSup = '<span class="proprietaire" data-full-list="' . htmlspecialchars(implode(',', $users)) . '">' . (empty($pseudos) ? 'Aucun' : implode(', ', $pseudos)) . '</span>';
                    $stmt2->close();
                } elseif (in_array($idRarete, [3, 2, 1])) {
                    $stmt3 = $conn->prepare("SELECT SUM(quantite) as total FROM utilisateurs_cartes_animes WHERE carte_id = ?");
                    $stmt3->bind_param("i", $idCarte);
                    $stmt3->execute();
                    $res3 = $stmt3->get_result();
                    $total = ($res3->fetch_assoc()['total']) ?? 0;
                    $infoSup = 'Prises : <span class="quantite">' . $total . '</span>';
                    if ($idRarete == 3) {
                        $infoSup .= '/2';
                    } elseif ($idRarete == 1 || $idRarete == 2) {
                        $infoSup .= '/3';
                    }
                    $stmt3->close();

                    // Récupérer les pseudos pour les cartes 1, 2, 3
                    $stmt4 = $conn->prepare("SELECT u.pseudo FROM utilisateurs u JOIN utilisateurs_cartes_animes uc ON u.id = uc.user_id WHERE uc.carte_id = ?");
                    $stmt4->bind_param("i", $idCarte);
                    $stmt4->execute();
                    $res4 = $stmt4->get_result();
                    $owners = [];
                    while ($row4 = $res4->fetch_assoc()) {
                        $owners[] = htmlspecialchars($row4['pseudo']);
                    }
                    $ownersList = implode(', ', $owners);
                    $description .= "<p class='card-owners' style='display:none;'>" . $ownersList . "</p>";
                    $stmt4->close();

                }

                echo '<div class="card" data-anime="' . $anime . '" data-rarete="' . $idRarete . '">';
                echo '<img src="' . $image . '" alt="' . $nom . '" />';
                echo '<div class="card-content">';
                echo '<h2 class="card-title">' . $infoSup . '</h2>';
                if (!empty($description)) {
                    echo '<p class="card-description">' . $description . '</p>';
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
    <a href="https://discord.gg/kyfQZbnkjy" target="_blank"> Rejoindre</a>
</footer>
<script src="./js/main.js"></script>
</body>
</html>