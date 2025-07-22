<?php
require_once '../src/Middleware/authRequired.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collection des joueurs</title>
    <link rel="stylesheet" href="/Css/styles.css">
    <link rel="stylesheet" href="/Css/header.css"/>
    <link rel="stylesheet" href="/Css/footer.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar">
        <a href="/" class="logo">RASENGAN</a>
        <div class="nav-links">
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/catalogue">Catalogue</a></li>
                <li class="active"><a href="/collection">Collection des joueurs</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><span class="welcome-message">Bienvenue, <?= htmlspecialchars($_SESSION['pseudo']) ?>!</span></li>
                    <li><a href="/logout">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="/connexion">Connexion</a></li>
                    <li><a href="/inscription">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <img src="./Images/burger.png" alt="Menu Hamburger" class="menu-burger">
    </nav>
</header>

<main>
    <div class="content">
        <div class="catalogue">
            <?php foreach ($joueurs as $joueur): ?>
                <div class="card special-card" data-url="./Joueurs/<?= $joueur['nom'] ?>.php">
                    <img src="../../Images/Cartes/<?= $joueur['image'] ?>" alt="<?= htmlspecialchars($joueur['nom']) ?>">
                    <div class="card-content">
                        <h2 class="card-title"><?= htmlspecialchars($joueur['nom']) ?></h2>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</main>

<footer>
    <p>© 2024 - Rasengan</p>
    <a href="https://discord.gg/kyfQZbnkjy" target="_blank"> Rejoindre</a>
</footer>

<script src="./js/main.js"></script>
<script>
    // Gestion des clics sur les cartes
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
