<?php /** @var App\Model\Utilisateur $user */ ?>
<?php /** @var array $animeCollection */ ?>
<?php /** @var array $filmCollection */ ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($user->getPseudo()) ?> - Collection</title>
    <link rel="stylesheet" href="/Css/styles.css"/>
    <link rel="stylesheet" href="/Css/header.css"/>
    <link rel="stylesheet" href="/Css/footer.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
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
        <img src="/Images/burger.png" alt="Menu Hamburger" class="menu-burger"/>
    </nav>
</header>
<main class="main-collec-responsive">
    <h2>Collection de <?= htmlspecialchars($user->getPseudo()) ?></h2>
    <div class="catalogue2">
        <?php if (empty($animeCollection) && empty($filmCollection)): ?>
            <p>Aucune carte.</p>
        <?php endif; ?>
        <?php foreach ($animeCollection as $card): ?>
            <div class="card" data-anime="<?= htmlspecialchars($card['nom']) ?>">
                <img src="/Rasengan/<?= htmlspecialchars($card['image']) ?>" alt="<?= htmlspecialchars($card['nom']) ?>"/>
                <div class="card-content">
                    <h2 class="card-title">x<?= (int)$card['quantite'] ?></h2>
                </div>
            </div>
        <?php endforeach; ?>
        <?php foreach ($filmCollection as $card): ?>
            <div class="card" data-film="<?= htmlspecialchars($card['nom']) ?>">
                <img src="/Rasengan/<?= htmlspecialchars($card['image']) ?>" alt="<?= htmlspecialchars($card['nom']) ?>"/>
                <div class="card-content">
                    <h2 class="card-title">x<?= (int)$card['quantite'] ?></h2>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
<footer>
    <p>© 2024 - Rasengan</p>
    <a href="https://discord.gg/kyfQZbnkjy" target="_blank">Rejoindre</a>
</footer>
<script src="/js/main.js"></script>
</body>
</html>
