<?php
require_once 'src/Initialisation/session_Auth.php';
require_once 'src/config/database.php';
require_once 'src/data/catalogues.php';
requireLogin();
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