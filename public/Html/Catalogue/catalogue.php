<?php /** @var array $animes */ ?>
<?php /** @var array $films */ ?>
<?php /** @var int $total_anime_cards */ ?>
<?php /** @var int $total_film_cards */ ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rasengan - Catalogue des Cartes</title>
    <link rel="stylesheet" href="/Css/catalogue.css"/>
    <link rel="stylesheet" href="/Css/header.css"/>
    <link rel="stylesheet" href="/Css/footer.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
</head>
<body>
<header>
    <nav class="navbar">
        <a href="/" class="logo">RASENGAN</a>
        <div class="nav-links">
            <ul>
                <li><a href="/">Accueil</a></li>
                <li class="active"><a href="/catalogue">Catalogue</a></li>
                <li><a href="/collection">Collection des joueurs</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><span class="welcome-message">Bienvenue, <?= htmlspecialchars($_SESSION['pseudo']) ?>!</span></li>
                    <li><a href="/logout">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="/connexion">Connexion</a></li>
                    <li><a href="/inscription">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <img src="/Images/burger.png" alt="Menu Hamburger" class="menu-burger"/>
    </nav>
</header>

<main>
    <h1>Catalogue des cartes</h1>
    <div class="main-catalogue">
        <div class="card" data-url="/cartes/anime">
            <img src="/Images/anime_catalogue.jpg" alt="Animés"/>
            <div class="card-content">
                <h2 class="card-title">Cartes animés</h2>
            </div>
        </div>
        <div class="card" data-url="/cartes/film">
            <img src="/Images/film_catalogue.jpg" alt="Films & séries" />
            <div class="card-content">
                <h2 class="card-title">Cartes films & séries</h2>
            </div>
        </div>
    </div>

</main>

<footer>
    <p>© 2024 - Rasengan</p>
    <a href="https://discord.gg/kyfQZbnkjy" target="_blank">Rejoindre</a>
</footer>

<script src="/js/main.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        document.querySelectorAll(".card").forEach((card) => {
            card.addEventListener("click", () => {
                const url = card.getAttribute("data-url");
                window.location.href = url;
            });
        });
    });
</script>
</body>
</html>
