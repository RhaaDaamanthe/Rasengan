<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Ma collection — Anime</title>
  <link rel="stylesheet" href="/CSS/styles.css">
  <link rel="stylesheet" href="/CSS/header.css"/>
  <link rel="stylesheet" href="/CSS/footer.css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:wght@100..900&family=Poppins:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
<header>
  <nav class="navbar">
    <a href="/" class="logo">RASENGAN</a>
    <div class="nav-links">
      <ul>
        <li><a href="/">Accueil</a></li>
        <li><a href="/catalogue">Catalogue</a></li>
        <li class="active"><a href="/collection">Ma collection</a></li>
        <?php if (isset($_SESSION['user_id'])): ?>
          <li><span class="welcome-message">Bienvenue, <?= htmlspecialchars($_SESSION['pseudo'] ?? ''); ?>!</span></li>
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
  <h1>Ma collection — Cartes Anime</h1>
  <div class="content">
    <div class="catalogue">
      <?php if (empty($cartes)): ?>
        <p>Aucune carte dans votre collection.</p>
      <?php else: ?>
        <?php foreach ($cartes as $carte): ?>
          <div class="card special-card">
            <img
              src="<?= htmlspecialchars('/Images/Cartes/' . ($carte['image_path'] ?? 'placeholder.png')); ?>"
              alt="<?= htmlspecialchars($carte['carte_nom'] ?? 'Carte'); ?>"
              loading="lazy"
            >
            <div class="card-content">
              <h2 class="card-title"><?= htmlspecialchars($carte['carte_nom'] ?? ''); ?></h2>
              <?php if (isset($carte['quantite'])): ?>
                <p class="card-qty">Quantité : <?= (int) $carte['quantite']; ?></p>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</main>

<footer>
  <p>© <?= date('Y'); ?> - Rasengan</p>
  <a href="https://discord.gg/kyfQZbnkjy" target="_blank" rel="noreferrer">Rejoindre</a>
</footer>

<script src="/JS/main.js"></script>
</body>
</html>
