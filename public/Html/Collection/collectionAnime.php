<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/header.css">
    <link rel="stylesheet" href="/css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat&family=Poppins&display=swap" rel="stylesheet">
    <title>Rasengan - Ma Collection d’Animes</title>
</head>
<body>
<header>
    <nav class="navbar">
        <a href="/index.php" class="logo">RASENGAN</a>
        <div class="nav-links">
            <ul>
                <li><a href="/index.php">Accueil</a></li>
                <li><a href="/catalogue">Catalogue</a></li>
                <li class="active"><a href="/collection">Ma Collection</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><span class="welcome-message">Bienvenue, <?= htmlspecialchars($_SESSION['pseudo']) ?>!</span></li>
                    <li><a href="/logout">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="/compte.php">Connexion</a></li>
                    <li><a href="/inscription.php">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <img src="/Images/burger.png" alt="Menu Hamburger" class="menu-burger">
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
        <?php if (!empty($cartes)): ?>
            <?php foreach ($cartes as $carte): ?>
                <div class="card" data-anime="<?= htmlspecialchars($carte['anime']) ?>" data-rarete="<?= $carte['id_rarete'] ?>">
                    <img src="/Rasengan/<?= htmlspecialchars($carte['image_path']) ?>" alt="<?= htmlspecialchars($carte['nom']) ?>">
                    <div class="card-content">
                        <h2 class="card-title"><?= htmlspecialchars($carte['info_sup']) ?></h2>
                        <?php if (!empty($carte['owners'])): ?>
                            <div class="owners-list">
                                <p>Propriétaires : <?= implode(', ', array_map('htmlspecialchars', $carte['owners'])) ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune carte d’animé dans votre collection.</p>
        <?php endif; ?>
    </div>
</main>

<footer>
    <p>© 2024 - Rasengan</p>
    <a href="https://discord.gg/kyfQZbnkjy" target="_blank">Rejoindre</a>
</footer>
<script src="/js/main.js"></script>
<script src="/js/utilisateurs_cartes.js"></script>
</body>
</html>
