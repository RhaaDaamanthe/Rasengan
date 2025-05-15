<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: compte.php");
    exit;
}

// Vérifier si l'utilisateur est administrateur
$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
error_log("Valeur de is_admin dans catalogue.php : " . ($is_admin ? 'true' : 'false'));

if (!$is_admin) {
    error_log("Utilisateur " . ($_SESSION['pseudo'] ?? 'inconnu') . " n'est pas administrateur.");
}

// Connexion à la base de données
$host = 'localhost';
$dbname = 'rasengan_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Erreur de connexion à la base : " . $e->getMessage());
    die("Erreur de connexion à la base de données. Veuillez réessayer plus tard.");
}

// Récupérer les animés distincts et leur nombre de cartes
try {
    $sql_animes = "
        SELECT LOWER(TRIM(anime)) AS anime, COUNT(*) as card_count 
        FROM cartes_animes 
        GROUP BY LOWER(TRIM(anime)) 
        ORDER BY anime ASC";
    $stmt_animes = $pdo->prepare($sql_animes);
    $stmt_animes->execute();
    $animes = $stmt_animes->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Erreur lors de la récupération des animés : " . $e->getMessage());
    $animes = [];
    echo "<p style='color:red;'>Erreur lors de la récupération des animés. Veuillez vérifier les logs.</p>";
}

// Calculer le total des cartes pour les animés
try {
    $total_anime_query = "
        SELECT SUM(card_count) as total 
        FROM (
            SELECT COUNT(*) as card_count 
            FROM cartes_animes 
            GROUP BY LOWER(TRIM(anime))
        ) AS subquery";
    $stmt_total_anime = $pdo->prepare($total_anime_query);
    $stmt_total_anime->execute();
    $total_anime_result = $stmt_total_anime->fetch(PDO::FETCH_ASSOC);
    $total_anime_cards = $total_anime_result['total'] ?? 0;
} catch (PDOException $e) {
    error_log("Erreur lors du calcul du total des animés : " . $e->getMessage());
    $total_anime_cards = 0;
}

// Récupérer les films distincts et leur nombre de cartes
try {
    $sql_films = "
        SELECT LOWER(TRIM(film)) AS film, COUNT(*) as card_count 
        FROM cartes_films 
        GROUP BY LOWER(TRIM(film)) 
        ORDER BY film ASC";
    $stmt_films = $pdo->prepare($sql_films);
    $stmt_films->execute();
    $films = $stmt_films->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Erreur lors de la récupération des films : " . $e->getMessage());
    $films = [];
    echo "<p style='color:red;'>Erreur lors de la récupération des films. La table 'cartes_films' existe-t-elle ? Veuillez vérifier les logs.</p>";
}

// Calculer le total des cartes pour les films
try {
    $total_film_query = "
        SELECT SUM(card_count) as total 
        FROM (
            SELECT COUNT(*) as card_count 
            FROM cartes_films 
            GROUP BY LOWER(TRIM(film))
        ) AS subquery";
    $stmt_total_film = $pdo->prepare($total_film_query);
    $stmt_total_film->execute();
    $total_film_result = $stmt_total_film->fetch(PDO::FETCH_ASSOC);
    $total_film_cards = $total_film_result['total'] ?? 0;
} catch (PDOException $e) {
    error_log("Erreur lors du calcul du total des films : " . $e->getMessage());
    $total_film_cards = 0;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/catalogue.css"/>
    <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet"/>
    <title>Rasengan - Catalogue des Cartes</title>
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
    <h1>Catalogue des cartes</h1>
    <div class="main-catalogue">
        <div class="card" data-url="CartesAnimes.php">
            <img src="Images/anime_catalogue.jpg" alt="Animés"/>
            <div class="card-content">
                <h2 class="card-title">Cartes animés</h2>
            </div>
        </div>
        <div class="card" data-url="CartesFilms.php">
            <img src="Images/film_catalogue.jpg" alt="Films & séries" />
            <div class="card-content">
                <h2 class="card-title">Cartes films & séries</h2>
            </div>
        </div>
    </div>
    <section class="catalogue-section">
        <div class="catalogue-container">
            <div class="catalogue-list">
                <h3>Animés</h3>
                <ul id="anime-list">
                    <?php if (empty($animes)): ?>
                        <li>Aucun animé trouvé.</li>
                    <?php else: ?>
                        <?php foreach ($animes as $anime): ?>
                            <li><?= htmlspecialchars(ucfirst($anime['anime'])) . ' (' . $anime['card_count'] . ')' ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <li class="total-cards"><strong>Total des cartes : <?= $total_anime_cards ?></strong></li>
                </ul>
            </div>
            <div class="catalogue-list">
                <h3>Films et séries</h3>
                <ul id="film-list">
                    <?php if (empty($films)): ?>
                        <li>Aucun film ou série trouvé.</li>
                    <?php else: ?>
                        <?php foreach ($films as $film): ?>
                            <li><?= htmlspecialchars(ucfirst($film['film'])) . ' (' . $film['card_count'] . ')' ?></li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <li class="total-cards"><strong>Total des cartes : <?= $total_film_cards ?></strong></li>
                </ul>
            </div>
        </div>
    </section>
</main>
<footer>
    <p>© 2024 - Rasengan</p>
    <a href="https://discord.gg/kyfQZbnkjy" target="_blank">Rejoindre</a>
</footer>
<script src="js/main.js"></script>
</body>
</html>