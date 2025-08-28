<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rasengan - Ma Collection de Films</title>

    <!-- Unifie la casse des dossiers (conseille: /CSS, /JS, /Images) -->
    <link rel="stylesheet" href="/CSS/styles.css">
    <link rel="stylesheet" href="/CSS/header.css">
    <link rel="stylesheet" href="/CSS/footer.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat&family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
<header>
    <nav class="navbar">
        <a href="/" class="logo">RASENGAN</a>
        <div class="nav-links">
            <ul>
                <li><a href="/">Accueil</a></li>
                <li><a href="/catalogue">Catalogue</a></li>
                <li class="active"><a href="/collection">Ma Collection</a></li>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <li><span class="welcome-message">Bienvenue, <?= htmlspecialchars($_SESSION['pseudo'] ?? '') ?>!</span></li>
                    <li><a href="/logout">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="/connexion">Connexion</a></li>
                    <li><a href="/inscription">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <img src="/Images/burger.png" alt="Menu Hamburger" class="menu-burger">
    </nav>
</header>

<main>
    <input type="text" id="searchbar" placeholder="Recherche un personnage ou un film">

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
                <div class="card"
                     data-film="<?= htmlspecialchars($carte['film'] ?? '') ?>"
                     data-rarete="<?= htmlspecialchars((string)($carte['id_rarete'] ?? '')) ?>">
                    <img
                        src="<?= htmlspecialchars('/Images/Cartes/' . ($carte['image_path'] ?? 'placeholder.png')) ?>"
                        alt="<?= htmlspecialchars($carte['nom'] ?? 'Carte') ?>"
                        loading="lazy"
                    >
                    <div class="card-content">
                        <h2 class="card-title"><?= htmlspecialchars($carte['nom'] ?? '') ?></h2>
                        <?php if (isset($carte['quantite'])): ?>
                            <p class="card-qty">Quantité : <?= (int)$carte['quantite'] ?></p>
                        <?php endif; ?>
                        <?php if (!empty($carte['film'])): ?>
                            <p class="card-film">Film : <?= htmlspecialchars($carte['film']) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Aucune carte de film dans votre collection.</p>
        <?php endif; ?>
    </div>
</main>

<footer>
    <p>© <?= date('Y') ?> - Rasengan</p>
    <a href="https://discord.gg/kyfQZbnkjy" target="_blank" rel="noreferrer">Rejoindre</a>
</footer>

<script src="/JS/main.js"></script>
<script src="/JS/utilisateurs_cartes.js"></script>
</body>
</html>
