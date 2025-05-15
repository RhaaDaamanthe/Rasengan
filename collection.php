<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: compte.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <title>Collection des joueurs</title>
</head>
<body>
    <header>
        <nav class="navbar">
            <a href="index.php" class="logo">RASENGAN</a>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="catalogue.php">Catalogue</a></li>
                    <li class="active"><a href="collection.php">Collection des joueurs</a></li>
                    <?php if (isset($_SESSION['user_id'])): ?>
    <li><span class="welcome-message">Bienvenue, <?= htmlspecialchars($_SESSION['pseudo']) ?>!</span></li>
    <li><a href="logout.php">Déconnexion</a></li>
                    <?php else: ?>
                      <li><a href="compte.php">Connexion</a></li>
                      <li><a href="inscription.php">Inscription</a></li>
                    <?php endif; ?>
                </ul>
            </div>
            <img src="./Images/burger.png" alt="Menu Hamburger " class="menu-burger">
        </nav>
    </header>
    <main>
        <div class="content">
            <div class="catalogue">
                <div class="card special-card" data-url="./Joueurs/Alexas.php">
                    <img src="./Images/Cartes/Epiques/55_Nana Osaki.jpg" alt="Alexas">
                    <div class="card-content">
                        <h2 class="card-title">Alexas</h2>
                    </div>
                </div>
                <div class="card special-card" data-url="./Joueurs/AstroFalcon.php">
                    <img src="./Images/Cartes/Mythiques/2_La squad.jpg" alt="AstroFalcon">
                    <div class="card-content">
                        <h2 class="card-title">AstroFalcon</h2>
                    </div>
                </div>
                <div class="card special-card" data-url="./Joueurs/Bao.php">
                    <img src="./Images/Cartes/Events/22_Nezuko.jpg" alt="Bao">
                    <div class="card-content">
                        <h2 class="card-title">Bao</h2>
                    </div>
                </div>
                <div class="card special-card" data-url="./Joueurs/Citron.php">
                    <img src="./Images/Cartes/Epiques/50_Violet.jpg" alt="Citron">
                    <div class="card-content">
                        <h2 class="card-title">Citron</h2>
                    </div>
                </div>
                <div class="card special-card" data-url="./Joueurs/Emeline.php">
                    <img src="./Images/Cartes/Films_Legendaires/18_Hermione Granger.jpg" alt="Emeline">
                    <div class="card-content">
                        <h2 class="card-title">Emeline</h2>
                    </div>
                </div>
                <div class="card special-card" data-url="./Joueurs/Kevin.php">
                    <img src="./Images/Cartes/Legendaires/10_Denji.jpg" alt="Kevin">
                    <div class="card-content">
                        <h2 class="card-title">Kevin</h2>
                    </div>
                </div>
                <div class="card special-card" data-url="./Joueurs/Kenza.php">
                    <img src="./Images/Cartes/Films_Epiques/24_Viktor.jpg" alt="Kenza">
                    <div class="card-content">
                        <h2 class="card-title">Kenza</h2>
                    </div>
                </div>
                <div class="card special-card" data-url="./Joueurs/Loris.php">
                    <img src="./Images/Cartes/Communes/37_Senritsu.jpg" alt="Loris">
                    <div class="card-content">
                        <h2 class="card-title">Loris</h2>
                    </div>
                </div>
                <div class="card special-card" data-url="./Joueurs/Micka.php">
                    <img src="./Images/Cartes/Epiques/111_Natsume.jpg" alt="Micka">
                    <div class="card-content">
                        <h2 class="card-title">Micka</h2>
                    </div>
                </div>
                <div class="card special-card" data-url="./Joueurs/RhaaDaamanthe.php">
                    <img src="./Images/Cartes/Legendaires/6_Zenitsu.jpg" alt="RhaaDaamanthe">
                    <div class="card-content">
                        <h2 class="card-title">RhaaDaamanthe</h2>
                    </div>
                </div>
                <div class="card special-card" data-url="./Joueurs/Roxas.php">
                    <img src="./Images/Cartes/Legendaires/3_David.jpg" alt="Roxas">
                    <div class="card-content">
                        <h2 class="card-title">Roxas</h2>
                    </div>
                </div>
                <div class="card special-card" data-url="./Joueurs/Swaye.php">
                    <img src="./Images/Cartes/Epiques/98_Beatrice.jpg" alt="Swaye">
                    <div class="card-content">
                        <h2 class="card-title">Swaye</h2>
                    </div>
                </div>
                <div class="card special-card" data-url="./Joueurs/Tamo.php">
                    <img src="./Images/Cartes/Events/4_Gon.jpg" alt="Tamo">
                    <div class="card-content">
                        <h2 class="card-title">Tamo</h2>
                    </div>
                </div>
                <div class="card special-card" data-url="./Joueurs/Xene.php">
                    <img src="./Images/Cartes/Legendaires/30_Hinata.jpg" alt="Xene">
                    <div class="card-content">
                        <h2 class="card-title">Xene</h2>
                    </div>
                </div>
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