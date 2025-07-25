<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/Css/styles.css"/>
  <link rel="stylesheet" href="/Css/header.css"/>
  <link rel="stylesheet" href="/Css/footer.css"/>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"/>
  <title>Rasengan - Cards Collection</title>
</head>
<body>
  <header>
    <nav class="navbar">
      <a href="/" class="logo">RASENGAN</a>
      <div class="nav-links">
        <ul>
          <li class="active"><a href="/">Accueil</a></li>
          <li><a href="/admin">prout</a></li>
          <li><a href="/catalogue">Catalogue</a></li>
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
      <img src="/Images/Cartes/burger.png" alt="Menu Hamburger" class="menu-burger"/>
    </nav>
  </header>

  <main>
    <?php if (isset($_SESSION['user_id'])): ?>
      <p class="welcome">Bienvenue dans ton espace, <?= htmlspecialchars($_SESSION['pseudo']) ?> !</p>
    <?php else: ?>
      <p class="welcome">Bienvenue ! <a href="/compte">Connecte-toi</a> pour accéder à ta collection de cartes.</p>
    <?php endif; ?>

    <div class="animecardcollection">
      <img src="/Images/Cartes/Anime Cards Collection.jpg" alt="Image Description"/>
    </div>

    <div class="obtain-cards-container">
      <h1 class="obtain-cards-title">Comment obtenir des cartes ?</h1>
      <div class="methods-grid">
        <div class="method-card">
          <h3 class="method-title">Events du serveur</h3>
          <p class="method-description">LA méthode pour gagner le plus de cartes. Participez régulièrement aux événements organisés sur notre serveur.</p>
        </div>
        <div class="method-card">
          <h3 class="method-title">Sessions vocales</h3>
          <p class="method-description">Participez aux paris et aux petits jeux organisés lors des sessions vocales.</p>
        </div>
        <div class="method-card">
          <h3 class="method-title">Système de niveaux</h3>
          <p class="method-description">Gagnez des niveaux en étant actif sur le serveur. Certains niveaux vous récompensent avec des cartes.</p>
        </div>
        <div class="method-card">
          <h3 class="method-title">Récompense hebdomadaire</h3>
          <p class="method-description">Réagissez au message épinglé une fois par semaine pour obtenir une carte aléatoire.</p>
        </div>
        <div class="method-card">
          <h3 class="method-title">Drops aléatoires</h3>
          <p class="method-description">Soyez le premier à réagir aux messages spéciaux dans le tchat général pour gagner une carte.</p>
        </div>
        <div class="method-card">
          <h3 class="method-title">Événements spéciaux</h3>
          <p class="method-description">Participez aux giveaways et n'oubliez pas d'enregistrer votre anniversaire avec /anniversaire définir pour recevoir un cadeau spécial.</p>
        </div>
      </div>
    </div>
  </main>

  <footer>
    <p>© 2024 - Rasengan</p>
    <a href="https://discord.gg/kyfQZbnkjy" target="_blank">Rejoindre</a>
  </footer>

  <script src="/Js/main.js"></script>
</body>
</html>
