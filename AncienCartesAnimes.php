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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./css/styles.css" />
    <link rel="stylesheet" href="./css/header.css"/>
    <link rel="stylesheet" href="./css/footer.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"/>
    <title>Rasengan - Cards Collection</title>
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
        <img
          src="./Images/burger.png" alt="Menu Hamburger" class="menu-burger"/>
      </nav>
    </header>
    <main>
        <input type="text" id="searchbar" placeholder="Recherche un personnage ou un animé."/>

        <div class="filters-container">
          <div class="filters">
              <div class="filter-group">
                  <label for="rarityFilter">🌟 Rareté</label>
                  <select id="rarityFilter">
                      <option value="">Toutes les raretés</option>
                      <option value="communes">Communes</option>
                      <option value="rares">Rares</option>
                      <option value="epiques">Épiques</option>
                      <option value="legendaires">Légendaires</option>
                      <option value="mythiques">Mythiques</option>
                      <option value="events">Events</option>
                  </select>
              </div>
          </div>
      </div>
      

      <div class="catalogue2">
        <div class="card" data-anime="One Piece">
            <img src="Images/Cartes/Events/1_Chopper.jpg" alt="Chopper" />
            <div class="card-content">
              <h2 class="card-title">Roxas</h2>
            </div>
          </div>
          <div class="card" data-anime="Shingeki no kyojin">
            <img src="Images/Cartes/Events/2_Levi.jpg" alt="Levi" />
            <div class="card-content">
              <h2 class="card-title">AstroFalcon</h2>
            </div>
          </div>
          <div class="card" data-anime="Spy X family">
            <img src="Images/Cartes/Events/3_Anya.jpg" alt="Anya" />
            <div class="card-content">
              <h2 class="card-title">RhaaDaamanthe</h2>
            </div>
          </div>
          <div class="card" data-anime="Hunter X Hunter">
            <img src="Images/Cartes/Events/4_Gon.jpg" alt="Gon" />
            <div class="card-content">
              <h2 class="card-title">Tamo</h2>
            </div>
          </div>
          <div class="card" data-anime="Re zero">
            <img src="Images/Cartes/Events/5_Emilia.jpg" alt="Emilia" />
            <div class="card-content">
              <h2 class="card-title">RhaaDaamanthe</h2>
            </div>
          </div>
          <div class="card" data-anime="Love is War">
            <img src="Images/Cartes/Events/6_Chika.jpg" alt="Chika" />
            <div class="card-content">
              <h2 class="card-title">Xene</h2>
            </div>
          </div>
          <div class="card" data-anime="Assassination Classroom">
            <img src="Images/Cartes/Events/7_Koro.jpg" alt="Koro" />
            <div class="card-content">
              <h2 class="card-title">Xene</h2>
            </div>
          </div>
          <div class="card" data-anime="My hero Academia">
            <img src="Images/Cartes/Events/8_Tsuyu.jpg" alt="Tsuyu" />
            <div class="card-content">
              <h2 class="card-title">Xene</h2>
            </div>
          </div>
          <div class="card" data-anime="Dragon ball">
            <img src="Images/Cartes/Events/9_Bulma.jpg" alt="Bulma" />
            <div class="card-content">
              <h2 class="card-title">Alexas</h2>
            </div>
          </div>
          <div class="card" data-anime="Konosuba">
            <img src="Images/Cartes/Events/10_Darkness.jpg" alt="Darkness" />
            <div class="card-content">
              <h2 class="card-title">Kevin</h2>
            </div>
          </div>
          <div class="card" data-anime="Oshi no Ko">
            <img src="Images/Cartes/Events/11_Ai.jpg" alt="Ai" />
            <div class="card-content">
              <h2 class="card-title">Xene</h2>
            </div>
          </div>
          <div class="card" data-anime="Toradora">
            <img src="Images/Cartes/Events/12_Taiga.jpg" alt="Taiga" />
            <div class="card-content">
              <h2 class="card-title">Bao</h2>
            </div>
          </div>
          <div class="card" data-anime="Black clover">
            <img src="Images/Cartes/Events/13_Asta.jpg" alt="Asta" />
            <div class="card-content">
              <h2 class="card-title">AstroFalcon</h2>
            </div>
          </div>
          <div class="card" data-anime="Sword art online">
            <img src="Images/Cartes/Events/14_Asuna.jpg" alt="Asuna" />
            <div class="card-content">
              <h2 class="card-title">Bao</h2>
            </div>
          </div>
          <div class="card" data-anime="Demon slayer">
            <img src="Images/Cartes/Events/15_Zenitsu.jpg" alt="Zenitsu" />
            <div class="card-content">
              <h2 class="card-title">Bao</h2>
            </div>
          </div>
          <div class="card" data-anime="Naruto">
            <img src="Images/Cartes/Events/16_Hinata.jpg" alt="Hinata" />
            <div class="card-content">
              <h2 class="card-title">RhaaDaamanthe</h2>
            </div>
          </div>
          <div class="card" data-anime="Frieren">
            <img src="Images/Cartes/Events/17_Frieren.jpg" alt="Frieren" />
            <div class="card-content">
              <h2 class="card-title">Swaye</h2>
            </div>
          </div>
          <div class="card" data-anime="Fairy Tail">
            <img src="Images/Cartes/Events/18_Lucy.jpg" alt="Lucy" />
            <div class="card-content">
              <h2 class="card-title">Swaye</h2>
            </div>
          </div>
          <div class="card" data-anime="Noragami">
            <img src="Images/Cartes/Events/19_Yato.jpg" alt="Yato" />
            <div class="card-content">
              <h2 class="card-title">Swaye</h2>
            </div>
          </div>
          <div class="card" data-anime="Horimiya">
            <img src="Images/Cartes/Events/20_Hori.jpg" alt="Hori" />
            <div class="card-content">
              <h2 class="card-title">Alexas</h2>
            </div>
          </div>
          <div class="card" data-anime="Haikyuu">
            <img src="Images/Cartes/Events/21_Hinata.jpg" alt="Hinata" />
            <div class="card-content">
              <h2 class="card-title">Citron</h2>
            </div>
          </div>
          <div class="card" data-anime="Demon slayer">
            <img src="Images/Cartes/Events/22_Nezuko.jpg" alt="Nezuko" />
            <div class="card-content">
              <h2 class="card-title">Bao</h2>
            </div>
          </div>
          <div class="card" data-anime="Demon slayer">
            <img src="Images/Cartes/Events/23_Mitsuri.jpg" alt="Mitsuri" />
            <div class="card-content">
              <h2 class="card-title">RhaaDaamanthe</h2>
            </div>
          </div>
          <div class="card" data-anime="">
            <img src="" alt="" />
            <div class="card-content">
              <h2 class="card-title"></h2>
            </div>
          </div>
  
          <!-- SAINT VALENTIN 2025 -->
  
          <div class="card" data-anime="Cyberpunk">
            <img src="Images/Cartes/Events/1_David.jpg" alt="David" />
            <div class="card-content">
              <h2 class="card-title">Kevin</h2>
            </div>
          </div>
          <div class="card" data-anime="Cyberpunk">
            <img src="Images/Cartes/Events/2_Lucy.jpg" alt="Lucy" />
            <div class="card-content">
              <h2 class="card-title">Roxas</h2>
            </div>
          </div>
          <div class="card" data-anime="A Sign of Affection">
            <img src="Images/Cartes/Events/3_Itsuomi.jpg" alt="Itsuomi" />
            <div class="card-content">
              <h2 class="card-title">Citron</h2>
            </div>
          </div>
          <div class="card" data-anime="A Sign of Affection">
            <img src="Images/Cartes/Events/4_Yuki.jpg" alt="Yuki" />
            <div class="card-content">
              <h2 class="card-title">Citron</h2>
            </div>
          </div>
          <div class="card" data-anime="Bunny girl Senpai">
            <img src="Images/Cartes/Events/5_Sakuta.jpg" alt="Sakuta" />
            <div class="card-content">
              <h2 class="card-title">Loris</h2>
            </div>
          </div>
          <div class="card" data-anime="Bunny girl Senpai">
            <img src="Images/Cartes/Events/6_Mai.jpg" alt="Mai" />
            <div class="card-content">
              <h2 class="card-title">Swaye</h2>
            </div>
          </div>
          <div class="card" data-anime="Love is War">
            <img src="Images/Cartes/Events/7_Kaguya.jpg" alt="Kaguya" />
            <div class="card-content">
              <h2 class="card-title">Xene</h2>
            </div>
          </div>
          <div class="card" data-anime="Love is War">
            <img src="Images/Cartes/Events/8_Miyuki.jpg" alt="Miyuki" />
            <div class="card-content">
              <h2 class="card-title">Alexas</h2>
            </div>
          </div>
          <div class="card" data-anime="Your lie in April">
            <img src="Images/Cartes/Events/9_Kosei.jpg" alt="Kosei" />
            <div class="card-content">
              <h2 class="card-title">Alexas</h2>
            </div>
          </div>
          <div class="card" data-anime="Your lie in April">
            <img src="Images/Cartes/Events/10_Kaori.jpg" alt="Kaori" />
            <div class="card-content">
              <h2 class="card-title">Xene</h2>
            </div>
          </div>
          <div class="card" data-anime="Kimi ni Todoke">
            <img src="Images/Cartes/Events/11_Shôta.jpg" alt="Shôta" />
            <div class="card-content">
              <h2 class="card-title">AstroFalcon</h2>
            </div>
          </div>
          <div class="card" data-anime="Kimi ni Todoke">
            <img src="Images/Cartes/Events/12_Sawako.jpg" alt="Sawako" />
            <div class="card-content">
              <h2 class="card-title">Loris</h2>
            </div>
          </div>
          <div class="card" data-anime="Presque mariés, loin d'être amoureux">
            <img src="Images/Cartes/Events/13_Jiro.jpg" alt="Jiro" />
            <div class="card-content">
              <h2 class="card-title">RhaaDaamanthe</h2>
            </div>
          </div>
          <div class="card" data-anime="Presque mariés, loin d'être amoureux">
            <img src="Images/Cartes/Events/14_Akari.jpg" alt="Akari" />
            <div class="card-content">
              <h2 class="card-title">RhaaDaamanthe</h2>
            </div>
          </div>
          <div class="card" data-anime="Your name">
            <img src="Images/Cartes/Events/15_Mitsuha.jpg" alt="Mitsuha" />
            <div class="card-content">
              <h2 class="card-title">AstroFalcon</h2>
            </div>
          </div>
          <div class="card" data-anime="Your name">
            <img src="Images/Cartes/Events/16_Taki.jpg" alt="Taki" />
            <div class="card-content">
              <h2 class="card-title">Roxas</h2>
            </div>
          </div>
          <div class="card" data-anime="Horimiya">
            <img src="Images/Cartes/Events/17_Yuki.jpg" alt="Yuki" />
            <div class="card-content">
              <h2 class="card-title">Kevin</h2>
            </div>
          </div>
          <div class="card" data-anime="Horimiya">
            <img src="Images/Cartes/Events/18_Toru.jpg" alt="Toru" />
            <div class="card-content">
              <h2 class="card-title">Swaye</h2>
            </div>
          </div>
          <div class="card" data-anime="Tokyo Revengers">
            <img src="Images/Cartes/Events/19_Hinata.jpg" alt="Hinata"/>
            <div class="card-content">
              <h2 class="card-title">Bao</h2>
            </div>
          </div>
          <div class="card" data-anime="Tokyo Revengers">
            <img src="Images/Cartes/Events/20_Takemichi.jpg" alt="Takemichi"/>
            <div class="card-content">
              <h2 class="card-title">Bao</h2>
            </div>
          </div>

          <!-- MYTHIQUES -->

        <div class="card" data-anime="demon slayer">
            <img src="Images/Cartes/Mythiques/1_Tanjiro vs Rui.jpg"
              alt="Tanjiro vs Rui"/>
            <div class="card-content">
              <h2 class="card-title">Xene</h2>
              <p class="card-description">Drop 1 an du jeu</p>
            </div>
          </div>
          <div class="card" data-anime="Dr Stone">
            <img src="Images/Cartes/Mythiques/2_La squad.jpg" alt="La squad" />
            <div class="card-content">
              <h2 class="card-title">AstroFalcon</h2>
              <p class="card-description">Gagnant du tournoi des tournois chifumi 1</p>
            </div>
          </div>
          <div class="card" data-anime="assassination classroom">
            <img src="Images/Cartes/Mythiques/3_La fin.jpg" alt="La fin" />
            <div class="card-content">
              <h2 class="card-title">Xene</h2>
              <p class="card-description">Drop 1 an du jeu</p>
            </div>
          </div>
          <div class="card" data-anime="shingeki no kyojin">
            <img
              src="Images/Cartes/Mythiques/4_La trahison.jpg"
              alt="La trahison"/>
            <div class="card-content">
              <h2 class="card-title">0/1</h2>
              <p class="card-description"></p>
            </div>
          </div>
          <div class="card" data-anime="one piece">
            <img src="Images/Cartes/Mythiques/5_Luffy Gear 2.jpg" alt="Luffy Gear 2"/>
            <div class="card-content">
              <h2 class="card-title">0/1</h2>
              <p class="card-description"></p>
            </div>
          </div>

          <!-- LEGENDAIRES -->

        <div class="card" data-anime="Black clover">
          <img src="Images/Cartes/Legendaires/1_Asta.jpg" alt="Asta" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Black clover">
          <img src="Images/Cartes/Legendaires/2_Julius.jpg" alt="Julius" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Cyberpunk">
          <img src="Images/Cartes/Legendaires/3_David.jpg" alt="David" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Cyberpunk">
          <img src="Images/Cartes/Legendaires/4_Lucy.jpg" alt="Lucy" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Demon slayer">
          <img src="Images/Cartes/Legendaires/5_Tanjiro.jpg" alt="Tanjiro" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Demon slayer">
          <img src="Images/Cartes/Legendaires/6_Zenitsu.jpg" alt="Zenitsu" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Demon slayer">
          <img src="Images/Cartes/Legendaires/7_Inosuke.jpg" alt="Inosuke" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Naruto">
          <img src="Images/Cartes/Legendaires/8_Naruto.jpg" alt="Naruto" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Naruto">
          <img src="Images/Cartes/Legendaires/9_Sasuke.jpg" alt="Sasuke" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Chainsaw man">
          <img src="Images/Cartes/Legendaires/10_Denji.jpg" alt="Denji" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Chainsaw man">
          <img src="Images/Cartes/Legendaires/11_Makima.jpg" alt="Makima" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Dr Stone">
          <img src="Images/Cartes/Legendaires/12_Senku.jpg" alt="Senku" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Fairy tail">
          <img src="Images/Cartes/Legendaires/13_Natsu.jpg" alt="Natsu" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Fairy tail">
          <img src="Images/Cartes/Legendaires/14_Lucy.jpg" alt="Lucy" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Fairy tail">
          <img src="Images/Cartes/Legendaires/15_Erza.jpg" alt="Erza" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="One piece">
          <img src="Images/Cartes/Legendaires/16_Luffy.jpg" alt="Luffy" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="One piece">
          <img src="Images/Cartes/Legendaires/17_Nami.jpg" alt="Nami" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="One piece">
          <img src="Images/Cartes/Legendaires/18_Zoro.jpg" alt="Zoro" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="My hero academia">
          <img src="Images/Cartes/Legendaires/19_Izuku.jpg" alt="Izuku" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="My hero academia">
          <img
            src="Images/Cartes/Legendaires/20_All Might.jpg"
            alt="All Might"
          />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="My hero academia">
          <img
            src="Images/Cartes/Legendaires/21_Shigaraki.jpg"
            alt="Shigaraki"
          />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Bleach">
          <img src="Images/Cartes/Legendaires/22_Ichigo.jpg" alt="Ichigo" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Dragon ball">
          <img src="Images/Cartes/Legendaires/23_Goku.jpg" alt="Goku" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Dragon ball">
          <img src="Images/Cartes/Legendaires/24_Vegeta.jpg" alt="Vegeta" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Jujutsu Kaisen">
          <img src="Images/Cartes/Legendaires/25_Yuji.jpg" alt="Yuji" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Jujutsu Kaisen">
          <img src="Images/Cartes/Legendaires/26_Gojo.jpg" alt="Gojo" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Demon slayer">
          <img src="Images/Cartes/Legendaires/27_Akaza.jpg" alt="Akaza" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Hunter x hunter">
          <img src="Images/Cartes/Legendaires/28_Kirua.jpg" alt="Kirua" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Hunter x hunter">
          <img src="Images/Cartes/Legendaires/29_Meruem.jpg" alt="Meruem" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Haikyuu">
          <img src="Images/Cartes/Legendaires/30_Hinata.jpg" alt="Hinata" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Haikyuu">
          <img src="Images/Cartes/Legendaires/31_Kageyama.jpg" alt="Kageyama" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Shingeki no kyojin">
          <img src="Images/Cartes/Legendaires/32_Livai.jpg" alt="Livai" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Shingeki no kyojin">
          <img src="Images/Cartes/Legendaires/33_Eren.jpg" alt="Eren" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Naruto">
          <img src="Images/Cartes/Legendaires/34_Itachi.jpg" alt="Itachi" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Death note">
          <img src="Images/Cartes/Legendaires/35_Light.jpg" alt="Light" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Death note">
          <img src="Images/Cartes/Legendaires/36_L.jpg" alt="L" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Tokyo ghoul">
          <img src="Images/Cartes/Legendaires/37_Kaneki.jpg" alt="Kaneki" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Demon slayer">
          <img
            src="Images/Cartes/Legendaires/38_Kokushibo.jpg"
            alt="Kokushibo"
          />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Jojo's bizarre adventures">
          <img src="Images/Cartes/Legendaires/39_Jotaro.jpg" alt="Jotaro" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="One piece">
          <img src="Images/Cartes/Legendaires/40_Sanji.jpg" alt="Sanji" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Naruto">
          <img src="Images/Cartes/Legendaires/41_Pain.jpg" alt="Pain" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Sword art online">
          <img src="Images/Cartes/Legendaires/42_Kirito.jpg" alt="Kirito" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Sword art online">
          <img src="Images/Cartes/Legendaires/43_Asuna.jpg" alt="Asuna" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Jojo's bizarre adventures">
          <img src="Images/Cartes/Legendaires/44_Dio.jpg" alt="Dio" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Jojo's bizarre adventures">
          <img src="Images/Cartes/Legendaires/45_J.Joseph.jpg" alt="Joseph" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Akame ga kill">
          <img src="Images/Cartes/Legendaires/46_Akame.jpg" alt="Akame" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="One piece">
          <img src="Images/Cartes/Legendaires/47_Katakuri.jpg" alt="Katakuri" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Black clover">
          <img src="Images/Cartes/Legendaires/48_Yuno.jpg" alt="Yuno" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Black clover">
          <img src="Images/Cartes/Legendaires/49_Noelle.jpg" alt="Noelle" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Naruto">
          <img src="Images/Cartes/Legendaires/50_Jiraya.jpg" alt="Jiraya" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="One punch man">
          <img src="Images/Cartes/Legendaires/51_Saitama.jpg" alt="Saitama" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Lycoris recoil">
          <img src="Images/Cartes/Legendaires/52_Chisato.jpg" alt="Chisato" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Assasination Classroom">
          <img src="Images/Cartes/Legendaires/53_Nagisa.jpg" alt="Nagisa" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Assasination Classroom">
          <img src="Images/Cartes/Legendaires/54_Koro.jpg" alt="Koro" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Les carnets de l'apothicaire">
          <img src="Images/Cartes/Legendaires/55_Maomao.jpg" alt="Maomao" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Akatsuki no yona">
          <img src="Images/Cartes/Legendaires/56_Son Hak.jpg" alt="Son Hak" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Akatsuki no yona">
          <img src="Images/Cartes/Legendaires/57_Su-Won.jpg" alt="Su-Won" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Akatsuki no yona">
          <img src="Images/Cartes/Legendaires/58_Yona.jpg" alt="Yona" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Blue lock">
          <img src="Images/Cartes/Legendaires/59_Isagi.jpg" alt="Isagi" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Shingeki no kyojin">
          <img src="Images/Cartes/Legendaires/60_Armin.jpg" alt="Armin" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Shingeki no kyojin">
          <img src="Images/Cartes/Legendaires/61_Mikasa.jpg" alt="Mikasa" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Kuroko's basket">
          <img src="Images/Cartes/Legendaires/62_Kagami.jpg" alt="Kagami" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Kuroko's basket">
          <img src="Images/Cartes/Legendaires/63_Kuroko.jpg" alt="Kuroko" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="One piece">
          <img
            src="Images/Cartes/Legendaires/64_Barbe Blanche.jpg"
            alt="Barbe Blanche"
          />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Spy x family">
          <img src="Images/Cartes/Legendaires/65_Yor.jpg" alt="Yor" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Food wars">
          <img src="Images/Cartes/Legendaires/66_Soma.jpg" alt="Soma" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="The god of highschool">
          <img src="Images/Cartes/Legendaires/67_Jin Mori.jpg" alt="Jin Mori" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="The god of highschool">
          <img
            src="Images/Cartes/Legendaires/68_Han Daewi.jpg"
            alt="Han Daewi"
          />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Darling in the franxx">
          <img src="Images/Cartes/Legendaires/69_Zero Two.jpg" alt="Zero Two" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Saint Seiya">
          <img src="Images/Cartes/Legendaires/70_Seiya.jpg" alt="Seiya" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Fruits basket">
          <img src="Images/Cartes/Legendaires/71_Tohru.jpg" alt="Tohru" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Gurren Lagann">
          <img src="Images/Cartes/Legendaires/72_Simon.jpg" alt="Simon" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Nier automata">
          <img src="Images/Cartes/Legendaires/73_2B.jpg" alt="2B" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Horimiya">
          <img src="Images/Cartes/Legendaires/74_Izumi.jpg" alt="Izumi" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Horimiya">
          <img src="Images/Cartes/Legendaires/75_Kyôko.jpg" alt="Kyôko" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="My dress up darling">
          <img src="Images/Cartes/Legendaires/76_Gojo.jpg" alt="Gojo" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="My dress up darling">
          <img src="Images/Cartes/Legendaires/77_Marine.jpg" alt="Marine" />
          <div class="card-content">
            <h2 class="card-title">1/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Re zero">
          <img src="Images/Cartes/Legendaires/78_Subaru.jpg" alt="Subaru" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Re zero">
          <img src="Images/Cartes/Legendaires/79_Emilia.jpg" alt="Emilia" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Oshi no ko">
          <img src="Images/Cartes/Legendaires/80_Aqua.jpg" alt="Aqua" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Oshi no ko">
          <img src="Images/Cartes/Legendaires/81_Ruby.jpg" alt="Ruby" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="du mouvement de la terre">
          <img src="Images/Cartes/Legendaires/82_Rafal.jpg" alt="rafal" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="Solo leveling">
          <img src="Images/Cartes/Legendaires/83_Jin Woo.jpg" alt="Jin Woo" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="your lie in april">
          <img src="Images/Cartes/Legendaires/84_Kosei.jpg" alt="Kosei" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="your lie in april">
          <img src="Images/Cartes/Legendaires/85_Kaori.jpg" alt="Kaori" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>
        <div class="card" data-anime="">
          <img src="Images/Cartes/Legendaires/" alt="" />
          <div class="card-content">
            <h2 class="card-title">0/1</h2>
          </div>
        </div>

        <!-- EPIQUES -->

        <div class="card" data-anime="Black clover">
            <img src="Images/Cartes/Epiques/1_Mereoleona.jpg" alt="Mereoleona" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Black clover">
            <img src="Images/Cartes/Epiques/2_Fuegoleon.jpg" alt="Fuegoleon" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Demon slayer">
            <img src="Images/Cartes/Epiques/3_Daki.jpg" alt="Daki" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Demon slayer">
            <img src="Images/Cartes/Epiques/4_Gyutaro.jpg" alt="Gyutaro" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Naruto">
            <img src="Images/Cartes/Epiques/5_Gaara.jpg" alt="Gaara" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Naruto">
            <img src="Images/Cartes/Epiques/6_Hinata.jpg" alt="Hinata" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Naruto">
            <img src="Images/Cartes/Epiques/7_Rock Lee.jpg" alt="Rock Lee" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Naruto">
            <img src="Images/Cartes/Epiques/8_Sakura.jpg" alt="Sakura" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Chainsaw man">
            <img src="Images/Cartes/Epiques/9_Aki.jpg" alt="Aki" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Chainsaw man">
            <img src="Images/Cartes/Epiques/10_Power.jpg" alt="Power" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Dr Stone">
            <img src="Images/Cartes/Epiques/11_Chrome.jpg" alt="Chrome" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Dr Stone">
            <img src="Images/Cartes/Epiques/12_Gen.jpg" alt="Gen" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Fairy tail">
            <img src="Images/Cartes/Epiques/13_Grey.jpg" alt="Grey" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Fairy tail">
            <img src="Images/Cartes/Epiques/14_Happy.jpg" alt="Happy" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="One piece">
            <img src="Images/Cartes/Epiques/15_Koby.jpg" alt="Koby" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="One piece">
            <img src="Images/Cartes/Epiques/16_Yamato.jpg" alt="Yamato" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="My hero academia">
            <img src="Images/Cartes/Epiques/17_Ochako.jpg" alt="Ochako" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="My hero academia">
            <img src="Images/Cartes/Epiques/18_Eijiro.jpg" alt="Eijiro" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="My hero academia">
            <img src="Images/Cartes/Epiques/19_Mirio.jpg" alt="Mirio" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Bleach">
            <img src="Images/Cartes/Epiques/20_Yamamoto.jpg" alt="Yamamoto" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Bleach">
            <img src="Images/Cartes/Epiques/21_Aizen.jpg" alt="Aizen" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Dragon ball">
            <img src="Images/Cartes/Epiques/22_Picolo.jpg" alt="Picolo" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Dragon ball">
            <img src="Images/Cartes/Epiques/23_Gohan.jpg" alt="Gohan" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Jujutsu Kaisen">
            <img src="Images/Cartes/Epiques/24_Todo.jpg" alt="Todo" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Jujutsu Kaisen">
            <img src="Images/Cartes/Epiques/25_Nanami.jpg" alt="Nanami" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Jujutsu Kaisen">
            <img src="Images/Cartes/Epiques/26_Nobara.jpg" alt="Nobara" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Jujutsu Kaisen">
            <img src="Images/Cartes/Epiques/27_Megumi.jpg" alt="Megumi" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Demon slayer">
            <img src="Images/Cartes/Epiques/28_Rengoku.jpg" alt="Rengoku" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Demon slayer">
            <img src="Images/Cartes/Epiques/29_Tengen.jpg" alt="Tengen" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Hunter x hunter">
            <img src="Images/Cartes/Epiques/30_Gon.jpg" alt="Gon" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Hunter x hunter">
            <img src="Images/Cartes/Epiques/31_Hisoka.jpg" alt="Hisoka" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Hunter x hunter">
            <img src="Images/Cartes/Epiques/32_Kurapika.jpg" alt="Kurapika" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Hunter x hunter">
            <img src="Images/Cartes/Epiques/33_Neferupito.jpg" alt="Neferupito" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Haikyuu">
            <img src="Images/Cartes/Epiques/34_Nishinoya.jpg" alt="Nishinoya" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Haikyuu">
            <img src="Images/Cartes/Epiques/35_Ushijima.jpg" alt="Ushijima" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Shingeki no kyojin">
            <img src="Images/Cartes/Epiques/36_Historia.jpg" alt="Historia" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Shingeki no kyojin">
            <img src="Images/Cartes/Epiques/37_Sasha.jpg" alt="Sasha" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Shingeki no kyojin">
            <img src="Images/Cartes/Epiques/38_Hansi.jpg" alt="Hansi" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Mirai nikki">
            <img src="Images/Cartes/Epiques/39_Yuno.jpg" alt="Yuno" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Steins gate">
            <img src="Images/Cartes/Epiques/40_Okabe.jpg" alt="Okabe" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Naruto">
            <img src="Images/Cartes/Epiques/41_Tobi.jpg" alt="Tobi" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Naruto">
            <img src="Images/Cartes/Epiques/42_Kakashi.jpg" alt="Kakashi" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Death note">
            <img src="Images/Cartes/Epiques/43_Ryuk.jpg" alt="Ryuk" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Death note">
            <img src="Images/Cartes/Epiques/44_Misa & Rem.jpg" alt="Misa-Rem" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Princesse mononoké">
            <img src="Images/Cartes/Epiques/45_San.jpg" alt="San" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Soul eater">
            <img src="Images/Cartes/Epiques/46_Soul.jpg" alt="Soul" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Soul eater">
            <img
              src="Images/Cartes/Epiques/47_Death the Kid.jpg"
              alt="Death the Kid"
            />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Tokyo ghoul">
            <img src="Images/Cartes/Epiques/48_Toka.jpg" alt="Toka" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Hunter x hunter">
            <img src="Images/Cartes/Epiques/49_Netero.jpg" alt="Netero" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Violet evergarden">
            <img src="Images/Cartes/Epiques/50_Violet.jpg" alt="Violet" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Sword art online">
            <img src="Images/Cartes/Epiques/51_Eugeo.jpg" alt="Eugeo" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Sword art online">
            <img src="Images/Cartes/Epiques/52_Sinon.jpg" alt="Sinon" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Sword art online">
            <img src="Images/Cartes/Epiques/53_Alice.jpg" alt="Alice" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="High school of the dead">
            <img src="Images/Cartes/Epiques/54_Komuro.jpg" alt="Komuro" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Nana">
            <img src="Images/Cartes/Epiques/55_Nana Osaki.jpg" alt="Nana Osaki" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Shingeki no kyojin">
            <img src="Images/Cartes/Epiques/56_Reiner.jpg" alt="Reiner" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Blue lock">
            <img src="Images/Cartes/Epiques/57_Bachira.jpg" alt="Bachira" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Blue lock">
            <img src="Images/Cartes/Epiques/58_Nagi.jpg" alt="Nagi" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Fairy tail">
            <img src="Images/Cartes/Epiques/59_Gajeel.jpg" alt="Gajeel" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Time shadows summer time rendering">
            <img src="Images/Cartes/Epiques/60_Shinpei.jpg" alt="Shinpei" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Time shadows summer time rendering">
            <img src="Images/Cartes/Epiques/61_Ushio.jpg" alt="Ushio" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Jojo's bizarre adventures">
            <img src="Images/Cartes/Epiques/62_JP Polnareff.jpg" alt="JP Polnareff"/>
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Jojo's bizarre adventures">
            <img src="Images/Cartes/Epiques/63_Narancia.jpg" alt="Narancia" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Your name">
            <img src="Images/Cartes/Epiques/64_Mitsuha.jpg" alt="Mitsuha" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Your name">
            <img src="Images/Cartes/Epiques/65_Taki.jpg" alt="Taki" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="The quintessential quintuplets">
            <img src="Images/Cartes/Epiques/66_Miku.jpg" alt="Miku" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="The quintessential quintuplets">
            <img src="Images/Cartes/Epiques/67_Nino.jpg" alt="Nino" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Akame ga kill">
            <img src="Images/Cartes/Epiques/68_Esdeath.jpg" alt="Esdeath" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Akame ga kill">
            <img src="Images/Cartes/Epiques/69_Tatsumi.jpg" alt="Tatsumi" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="One piece">
            <img src="Images/Cartes/Epiques/70_Franky.jpg" alt="Franky" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="One piece">
            <img src="Images/Cartes/Epiques/71_Chopper.jpg" alt="Chopper" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="One piece">
            <img src="Images/Cartes/Epiques/72_Brook.jpg" alt="Brook" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Naruto">
            <img src="Images/Cartes/Epiques/73_Orochimaru.jpg" alt="Orochimaru" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Naruto">
            <img src="Images/Cartes/Epiques/74_Tsunade.jpg" alt="Tsunade" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="One punch man">
            <img src="Images/Cartes/Epiques/75_Genos.jpg" alt="Genos" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="One punch man">
            <img src="Images/Cartes/Epiques/76_Garou.jpg" alt="Garou" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="One punch man">
            <img src="Images/Cartes/Epiques/77_Boros.jpg" alt="Boros" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="One punch man">
            <img src="Images/Cartes/Epiques/78_Fubuki.jpg" alt="Fubuki" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="One punch man">
            <img src="Images/Cartes/Epiques/79_Tatsumaki.jpg" alt="Tatsumaki" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Lycoris recoil">
            <img src="Images/Cartes/Epiques/80_Takina.jpg" alt="Takina" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Assasination classroom">
            <img src="Images/Cartes/Epiques/81_Karma.jpg" alt="Karma" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Les carnets de l'apothicaire">
            <img src="Images/Cartes/Epiques/82_Jinshi.jpg" alt="Jinshi" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Akatsuki no yona">
            <img src="Images/Cartes/Epiques/83_Zeno.jpg" alt="Zeno" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Akatsuki no yona">
            <img src="Images/Cartes/Epiques/84_Shin-Ah.jpg" alt="Shin-Ah" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Akatsuki no yona">
            <img src="Images/Cartes/Epiques/85_Ki-Jae.jpg" alt="Ki-Jae" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Akatsuki no yona">
            <img src="Images/Cartes/Epiques/86_Jae_Ha.jpg" alt="Jae_Ha" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Kuroko's basket">
            <img
              src="Images/Cartes/Epiques/87_Murasakibara.jpg"
              alt="Murasakibara"
            />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Kuroko's basket">
            <img src="Images/Cartes/Epiques/88_Midorima.jpg" alt="Midorima" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Kuroko's basket">
            <img src="Images/Cartes/Epiques/89_Akashi.jpg" alt="Akashi" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Kuroko's basket">
            <img src="Images/Cartes/Epiques/90_Kise.jpg" alt="Kise" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Kuroko's basket">
            <img src="Images/Cartes/Epiques/91_Aomine.jpg" alt="Aomine" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Demon slayer">
            <img src="Images/Cartes/Epiques/92_Shinobu.jpg" alt="Shinobu" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Demon slayer">
            <img src="Images/Cartes/Epiques/93_Kanao.jpg" alt="Kanao" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Kill la kill">
            <img src="Images/Cartes/Epiques/94_Ryuko.jpg" alt="Ryuko" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Mahou shoujo madoka mjika">
            <img src="Images/Cartes/Epiques/95_Madoka.jpg" alt="Madoka" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Higurashi no naku koro ni">
            <img src="Images/Cartes/Epiques/96_Rena.jpg" alt="Rena" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Umineko no naku koro ni">
            <img src="Images/Cartes/Epiques/97_Battler.jpg" alt="Battler" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Umineko no naku koro ni">
            <img src="Images/Cartes/Epiques/98_Beatrice.jpg" alt="Beatrice" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Naruto">
            <img src="Images/Cartes/Epiques/99_Shikamaru.jpg" alt="Shikamaru" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Demon slayer">
            <img src="Images/Cartes/Epiques/100_Mitsuri.jpg" alt="Mitsuri" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Demon slayer">
            <img src="Images/Cartes/Epiques/101_Obanai.jpg" alt="Obanai" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Metallic rouge">
            <img
              src="Images/Cartes/Epiques/102_Rouge Redstar.jpg"
              alt="Rouge Redstar"
            />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="One Piece">
            <img src="Images/Cartes/Epiques/103_Marco.jpg" alt="Marco" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="One piece">
            <img src="Images/Cartes/Epiques/104_Ace.jpg" alt="Ace" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="One piece">
            <img src="Images/Cartes/Epiques/105_Usopp.jpg" alt="Usopp" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="One piece">
            <img src="Images/Cartes/Epiques/106_Robin.jpg" alt="Robin" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Spy x family">
            <img src="Images/Cartes/Epiques/107_Loid.jpg" alt="Loid" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Spy x family">
            <img src="Images/Cartes/Epiques/108_Anya.jpg" alt="Anya" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Food wars">
            <img src="Images/Cartes/Epiques/109_Megumi.jpg" alt="Megumi" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Food wars">
            <img src="Images/Cartes/Epiques/110_Erina.jpg" alt="Erina" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Deca dence">
            <img src="Images/Cartes/Epiques/111_Natsume.jpg" alt="Natsume" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Mieruko chan">
            <img src="Images/Cartes/Epiques/112_Miko.jpg" alt="Miko" />
            <div class="card-content">
              <h2 class="card-title">/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Anohana">
            <img src="Images/Cartes/Epiques/113_Jintan.jpg" alt="Jintan" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Anohana">
            <img src="Images/Cartes/Epiques/114_Menma.jpg" alt="Menma" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Black clover">
            <img src="Images/Cartes/Epiques/115_Mimosa.jpg" alt="Mimosa" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="My hero academia">
            <img src="Images/Cartes/Epiques/116_Shoto.jpg" alt="Shoto" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="My hero academia">
            <img src="Images/Cartes/Epiques/117_Mirko.jpg" alt="Mirko" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="The god of highschool">
            <img src="Images/Cartes/Epiques/118_Lipyo.jpg" alt="Lipyo" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="The god of highschool">
            <img
              src="Images/Cartes/Epiques/119_Jin Taejin.jpg"
              alt="Jin Taejin"
            />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Darling in the franxx">
            <img src="Images/Cartes/Epiques/120_Hiro.jpg" alt="Hiro" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Darling in the franxx">
            <img src="Images/Cartes/Epiques/121_Ichigo.jpg" alt="Ichigo" />
            <div class="card-content">
              <h2 class="card-title">2/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Death parade">
            <img src="Images/Cartes/Epiques/122_Decim.jpg" alt="Decim" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Saint seiya">
            <img src="Images/Cartes/Epiques/123_Hyôga.jpg" alt="Hyôga" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Saint seiya">
            <img src="Images/Cartes/Epiques/124_Mû.jpg" alt="Mû" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Saint seiya">
            <img src="Images/Cartes/Epiques/125_Aioria.jpg" alt="Aioria" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Saint seiya">
            <img src="Images/Cartes/Epiques/126_Shaka.jpg" alt="Shaka" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Fruits basket">
            <img src="Images/Cartes/Epiques/127_Kyô.jpg" alt="Kyô" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Fruits basket">
            <img src="Images/Cartes/Epiques/128_Yuki.jpg" alt="Yuki" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Gurren lagann">
            <img src="Images/Cartes/Epiques/129_Yoko.jpg" alt="Yoko" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Gurren lagann">
            <img src="Images/Cartes/Epiques/130_Kamina.jpg" alt="Kamina" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Nier automata">
            <img src="Images/Cartes/Epiques/131_9S.jpg" alt="9S" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Nier automata">
            <img src="Images/Cartes/Epiques/132_A2.jpg" alt="A2" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Horimiya">
            <img src="Images/Cartes/Epiques/133_Yuki.jpg" alt="Yuki" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Horimiya">
            <img src="Images/Cartes/Epiques/134_Tôru.jpg" alt="Tôru" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Horimiya">
            <img src="Images/Cartes/Epiques/135_Remi.jpg" alt="Remi" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Re zero">
            <img src="Images/Cartes/Epiques/136_Beatrice.jpg" alt="Beatrice" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Oshi no ko">
            <img src="Images/Cartes/Epiques/137_Ai.jpg" alt="Ai" />
            <div class="card-content">
              <h2 class="card-title">1/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Oshi no ko">
            <img src="Images/Cartes/Epiques/138_Kana.jpg" alt="Kana" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="Oshi no ko">
            <img src="Images/Cartes/Epiques/139_Akane.jpg" alt="Akane" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="demon slayer">
            <img src="Images/Cartes/Epiques/140_Nezuko.jpg" alt="Nezuko" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="negative positive angler">
            <img src="Images/Cartes/Epiques/141_Tsunehiro.jpg" alt="Tsunehiro" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="negative positive angler">
            <img src="Images/Cartes/Epiques/142_Takaaki.jpg" alt="Takaaki" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="du mouvement de la terre">
            <img src="Images/Cartes/Epiques/143_Oczy.jpg" alt="oczy" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="du mouvement de la terre">
            <img src="Images/Cartes/Epiques/144_Badeni.jpg" alt="badeni" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="du mouvement de la terre">
            <img src="Images/Cartes/Epiques/145_Douraka.jpg" alt="douraka" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="du mouvement de la terre">
            <img src="Images/Cartes/Epiques/146_Jolenta.jpg" alt="jolenta" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="solo leveling">
            <img src="Images/Cartes/Epiques/147_Cha Hae-In.jpg" alt="Cha Hae-In" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="dr stone">
            <img src="Images/Cartes/Epiques/148_Taiju.jpg" alt="taiju" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="dr stone">
            <img src="Images/Cartes/Epiques/149_Ryusui.jpg" alt="ryusui" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="your lie in april">
            <img src="Images/Cartes/Epiques/150_Tsubaki.jpg" alt="tsubaki" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="your lie in april">
            <img src="Images/Cartes/Epiques/151_Watari.jpg" alt="Watari" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="elfen lied">
            <img src="Images/Cartes/Epiques/152_Kôta.jpg" alt="Kôta" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="elfen lied">
            <img src="Images/Cartes/Epiques/153_Lucy.jpg" alt="Lucy" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="undead murder farce">
            <img src="Images/Cartes/Epiques/154_Tsugaru.jpg" alt="Tsugaru" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="undead murder farce">
            <img src="Images/Cartes/Epiques/155_Aya.jpg" alt="Aya" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="shingeki no kyojin">
            <img src="Images/Cartes/Epiques/156_Erwin.jpg" alt="Erwin" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>
          <div class="card" data-anime="">
            <img src="Images/Cartes/Epiques/" alt="" />
            <div class="card-content">
              <h2 class="card-title">0/2</h2>
            </div>
          </div>

          <!-- RARES -->

          <div class="card" data-anime="black clover">
            <img src="Images/Cartes/Rares/1_Zora.jpg" alt="Zora" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="black clover">
            <img src="Images/Cartes/Rares/2_Vanessa.jpg" alt="Vanessa" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="cyberpunk">
            <img src="Images/Cartes/Rares/3_Rebecca.jpg" alt="Rebecca" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="demon slayer">
            <img src="Images/Cartes/Rares/4_Gyokko.jpg" alt="Gyokko" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="demon slayer">
            <img src="Images/Cartes/Rares/5_Rui.jpg" alt="Rui" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="demon slayer">
            <img src="Images/Cartes/Rares/6_Urokodaki.jpg" alt="Urokodaki" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="demon slayer">
            <img src="Images/Cartes/Rares/7_Haganezuka.jpg" alt="Haganezuka" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="naruto">
            <img src="Images/Cartes/Rares/8_Kabuto.jpg" alt="Kabuto" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="naruto">
            <img src="Images/Cartes/Rares/9_Konohamaru.jpg" alt="Konohamaru" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="naruto">
            <img src="Images/Cartes/Rares/10_Kimimaro.jpg" alt="Kimimaro" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="chainsaw man">
            <img src="Images/Cartes/Rares/11_Himeno.jpg" alt="Himeno" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="chainsaw man">
            <img src="Images/Cartes/Rares/12_Pochita.jpg" alt="Pochita" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="goblin slayer">
            <img
              src="Images/Cartes/Rares/13_Goblin Slayer.jpg"
              alt="Goblin Slayer"
            />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="dr stone">
            <img src="Images/Cartes/Rares/14_Saionji.jpg" alt="Saionji" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="dr stone">
            <img src="Images/Cartes/Rares/15_Suika.jpg" alt="Suika" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="fairy tail">
            <img src="Images/Cartes/Rares/16_Mirajane.jpg" alt="Mirajane" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="fairy tail">
            <img src="Images/Cartes/Rares/17_Juvia.jpg" alt="Juvia" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="fairy tail">
            <img src="Images/Cartes/Rares/18_Wendy.jpg" alt="Wendy" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="one piece">
            <img src="Images/Cartes/Rares/19_Arlong.jpg" alt="Arlong" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="one piece">
            <img src="Images/Cartes/Rares/20_Tashigi.jpg" alt="Tashigi" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="my hero academia">
            <img src="Images/Cartes/Rares/21_Tsuyu.jpg" alt="Tsuyu" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="my hero academia">
            <img src="Images/Cartes/Rares/22_Mount Lady.jpg" alt="Mount Lady" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="my hero academia">
            <img src="Images/Cartes/Rares/23_Jin.jpg" alt="Jin" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="my hero academia">
            <img src="Images/Cartes/Rares/24_Tenya.jpg" alt="Tenya" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="deadman wonderland">
            <img src="Images/Cartes/Rares/25_Genta.jpg" alt="Genta" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="deadman wonderland">
            <img src="Images/Cartes/Rares/26_Shiro.jpg" alt="Shiro" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="bleach">
            <img src="Images/Cartes/Rares/27_Grimmjow.jpg" alt="Grimmjow" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="dragon ball">
            <img src="Images/Cartes/Rares/28_Goten.jpg" alt="Goten" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="dragon ball">
            <img src="Images/Cartes/Rares/29_Trunks.jpg" alt="Trunks" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="dragon ball">
            <img src="Images/Cartes/Rares/30_Krillin.jpg" alt="Krillin" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="jujutsu kaisen">
            <img src="Images/Cartes/Rares/31_Hanami.jpg" alt="Hanami" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="jujutsu kaisen">
            <img src="Images/Cartes/Rares/32_Jogo.jpg" alt="Jogo" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="kabaneri">
            <img src="Images/Cartes/Rares/33_Mumei.jpg" alt="Mumei" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="hunter x hunter">
            <img src="Images/Cartes/Rares/34_Leolio.jpg" alt="Leolio" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="demon slayer">
            <img src="Images/Cartes/Rares/35_Sabito.jpg" alt="Sabito" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="demon slayer">
            <img src="Images/Cartes/Rares/36_Makomo.jpg" alt="Makomo" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="guilty crown">
            <img src="Images/Cartes/Rares/37_Inori.jpg" alt="Inori" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="haikyuu">
            <img src="Images/Cartes/Rares/38_Shimizu.jpg" alt="Shimizu" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="haikyuu">
            <img src="Images/Cartes/Rares/39_Sugawara.jpg" alt="Sugawara" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="haikyuu">
            <img src="Images/Cartes/Rares/40_Yamaguchi.jpg" alt="Yamaguchi" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="haikyuu">
            <img src="Images/Cartes/Rares/41_Tanaka.jpg" alt="Tanaka" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="shingeki no kyojin">
            <img src="Images/Cartes/Rares/42_Hannes.jpg" alt="Hannes" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="shingeki no kyojin">
            <img src="Images/Cartes/Rares/43_Marco.jpg" alt="Marco" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="shingeki no kyojin">
            <img src="Images/Cartes/Rares/44_Pixis.jpg" alt="Pixis" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="mirai nikki">
            <img src="Images/Cartes/Rares/45_Yukiteru.jpg" alt="Yukiteru" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="steins gate">
            <img src="Images/Cartes/Rares/46_Makise.jpg" alt="Makise" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="takt op destiny">
            <img src="Images/Cartes/Rares/47_Destiny.jpg" alt="Destiny" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="takt op destiny">
            <img src="Images/Cartes/Rares/48_Asahina.jpg" alt="Asahina" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="wonder egg priority">
            <img src="Images/Cartes/Rares/49_Ai.jpg" alt="Ai" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="naruto">
            <img src="Images/Cartes/Rares/50_Temari.jpg" alt="Temari" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="another">
            <img src="Images/Cartes/Rares/51_Mei.jpg" alt="Mei" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="death note">
            <img src="Images/Cartes/Rares/52_Near.jpg" alt="Near" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="death note">
            <img src="Images/Cartes/Rares/53_Mello.jpg" alt="Mello" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="dororo">
            <img
              src="Images/Cartes/Rares/54_Hyakkimimaru.jpg"
              alt="Hyakkimimaru"
            />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="princesse mononoke">
            <img src="Images/Cartes/Rares/55_Ashitaka.jpg" alt="Ashitaka" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akira">
            <img src="Images/Cartes/Rares/56_Kaneda.jpg" alt="Kaneda" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="soul eater">
            <img src="Images/Cartes/Rares/57_Black Star.jpg" alt="Black Star" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="soul eater">
            <img src="Images/Cartes/Rares/58_Tsubaki.jpg" alt="Tsubaki" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="soul eater">
            <img src="Images/Cartes/Rares/59_Maka.jpg" alt="Maka" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="soul eater">
            <img src="Images/Cartes/Rares/60_Blair.jpg" alt="Blair" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="tokyo ghoul">
            <img src="Images/Cartes/Rares/61_Hideyoshi.jpg" alt="Hideyoshi" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="hunter x hunter">
            <img src="Images/Cartes/Rares/62_Biscuit.jpg" alt="Biscuit" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="violet evergarden">
            <img src="Images/Cartes/Rares/63_Gilbert.jpg" alt="Gilbert" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="violet evergarden">
            <img src="Images/Cartes/Rares/64_Hodgins.jpg" alt="Hodgins" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="sword art online">
            <img src="Images/Cartes/Rares/65_Yuuki.jpg" alt="Yuuki" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="sword art online">
            <img src="Images/Cartes/Rares/66_Klein.jpg" alt="Klein" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="sword art online">
            <img src="Images/Cartes/Rares/67_Leafa.jpg" alt="Leafa" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="sword art online">
            <img src="Images/Cartes/Rares/68_Lisbeth.jpg" alt="Lisbeth" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="high school of the dead">
            <img src="Images/Cartes/Rares/69_Rei.jpg" alt="Rei" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="high school of the dead">
            <img src="Images/Cartes/Rares/70_Saya.jpg" alt="Saya" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="high school of the dead">
            <img src="Images/Cartes/Rares/71_Saeko.jpg" alt="Saeko" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="fairy tail">
            <img src="Images/Cartes/Rares/72_Seila.jpg" alt="Seila" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="time shadows">
            <img src="Images/Cartes/Rares/73_Mio.jpg" alt="Mio" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="time shadows">
            <img src="Images/Cartes/Rares/74_Hizuru.jpg" alt="Hizuru" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="jojo's bizarre adventure">
            <img src="Images/Cartes/Rares/75_J.Jonathan.jpg" alt="Jonathan" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="the quintessential quintuplets">
            <img src="Images/Cartes/Rares/76_Futaro.jpg" alt="Futaro" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="the quintessential quintuplets">
            <img src="Images/Cartes/Rares/77_Yotsuba.jpg" alt="Yotsuba" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="the quintessential quintuplets">
            <img src="Images/Cartes/Rares/78_Ichika.jpg" alt="Ichika" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="the quintessential quintuplets">
            <img src="Images/Cartes/Rares/79_Itsuki.jpg" alt="Itsuki" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akame ga kill">
            <img src="Images/Cartes/Rares/80_Sheele.jpg" alt="Sheele" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akame ga kill">
            <img src="Images/Cartes/Rares/81_Najenda.jpg" alt="Najenda" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akame ga kill">
            <img src="Images/Cartes/Rares/82_Lubbock.jpg" alt="Lubbock" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akame ga kill">
            <img src="Images/Cartes/Rares/83_Chelsea.jpg" alt="Chelsea" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akame ga kill">
            <img src="Images/Cartes/Rares/84_Leone.jpg" alt="Leone" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akame ga kill">
            <img src="Images/Cartes/Rares/85_Bulat.jpg" alt="Bulat" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akame ga kill">
            <img src="Images/Cartes/Rares/86_Kurome.jpg" alt="Kurome" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akame ga kill">
            <img src="Images/Cartes/Rares/87_Mine.jpg" alt="Mine" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="one piece">
            <img src="Images/Cartes/Rares/88_O-Kiku.jpg" alt="O-Kiku" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="one punch man">
            <img src="Images/Cartes/Rares/89_Sonic.jpg" alt="Sonic" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="lycoris recoil">
            <img src="Images/Cartes/Rares/90_Majima.jpg" alt="Majima" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="lycoris recoil">
            <img src="Images/Cartes/Rares/91_Mika.jpg" alt="Mika" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="lycoris recoil">
            <img src="Images/Cartes/Rares/92_Mizuki.jpg" alt="Mizuki" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="lycoris recoil">
            <img src="Images/Cartes/Rares/93_Kurumi.jpg" alt="Kurumi" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="assassination classroom"">
            <img src="Images/Cartes/Rares/94_Irina.jpg" alt="Irina" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="assassination classroom"">
            <img src="Images/Cartes/Rares/95_Kaede.jpg" alt="Kaede" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="assassination classroom">
            <img src="Images/Cartes/Rares/96_Tadaomi.jpg" alt="Tadaomi" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="les carnets de l'apothicaire">
            <img src="Images/Cartes/Rares/97_Pairin.jpg" alt="Pairin" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="les carnets de l'apothicaire">
            <img src="Images/Cartes/Rares/98_Fengxian.jpg" alt="Fengxian" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="les carnets de l'apothicaire">
            <img src="Images/Cartes/Rares/99_Meimei.jpg" alt="Meimei" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akatsuki no yona">
            <img src="Images/Cartes/Rares/100_Yun.jpg" alt="Yun" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="kuroko's basket">
            <img src="Images/Cartes/Rares/101_Izuki.jpg" alt="Izuki" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="kuroko's basket">
            <img src="Images/Cartes/Rares/102_Momoi.jpg" alt="Momoi" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="kuroko's basket">
            <img src="Images/Cartes/Rares/103_Aida.jpg" alt="Aida" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="demon slayer">
            <img src="Images/Cartes/Rares/104_Kanae.jpg" alt="Kanae" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="demon slayer">
            <img
              src="Images/Cartes/Rares/105_Makio, Suma, Hinatsuru.jpg"
              alt="Makio-Suma-Hinatsuru"
            />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="jojo's bizarre adventure">
            <img src="Images/Cartes/Rares/106_Speedwagon.jpg" alt="Speedwagon" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="jojo's bizarre adventure">
            <img src="Images/Cartes/Rares/107_Reimi.jpg" alt="Reimi" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="kill la kill">
            <img src="Images/Cartes/Rares/108_Satsuki.jpg" alt="Satsuki" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="kill la kill">
            <img src="Images/Cartes/Rares/109_Mako.jpg" alt="Mako" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="mahou shoujo madoka magika">
            <img src="Images/Cartes/Rares/110_Kyuubey.jpg" alt="Kyuubey" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="mahou shoujo madoka magika">
            <img src="Images/Cartes/Rares/111_Akemi.jpg" alt="Akemi" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="higurashi no naku koro ni">
            <img src="Images/Cartes/Rares/112_Rika.jpg" alt="Rika" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="higurashi no naku koro ni">
            <img src="Images/Cartes/Rares/113_Shion.jpg" alt="Shion" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="higurashi no naku koro ni">
            <img src="Images/Cartes/Rares/114_Mion.jpg" alt="Mion" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="umineko no naku koro ni">
            <img src="Images/Cartes/Rares/115_Shannon.jpg" alt="Shannon" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="umineko no naku koro ni">
            <img src="Images/Cartes/Rares/116_Jessica.jpg" alt="Jessica" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="naruto">
            <img src="Images/Cartes/Rares/117_Chiyo.jpg" alt="Chiyo" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="naruto">
            <img
              src="Images/Cartes/Rares/118_Kiba & Akamaru.jpg"
              alt="Kiba & Akamaru"
            />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="naruto">
            <img src="Images/Cartes/Rares/119_Konan.jpg" alt="Konan" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="naruto">
            <img src="Images/Cartes/Rares/120_Ino.jpg" alt="Ino" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="jujutsu kaisen">
            <img src="Images/Cartes/Rares/121_Mechamaru.jpg" alt="Mechamaru" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="metallic rouge">
            <img src="Images/Cartes/Rares/122_Naomi.jpg" alt="Naomi" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="one piece">
            <img src="Images/Cartes/Rares/123_Killer.jpg" alt="Killer" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="spy x family">
            <img src="Images/Cartes/Rares/124_Bond.jpg" alt="Bond" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="food wars">
            <img src="Images/Cartes/Rares/125_Ikumi.jpg" alt="Ikumi" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="food wars">
            <img src="Images/Cartes/Rares/126_Rindo.jpg" alt="Rindo" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="deca dence">
            <img src="Images/Cartes/Rares/127_Kaburagi.jpg" alt="Kaburagi" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="mieruko chan">
            <img src="Images/Cartes/Rares/128_Hana.jpg" alt="Hana" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="mieruko chan">
            <img src="Images/Cartes/Rares/129_Yuria.jpg" alt="Yuria" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="anohana">
            <img src="Images/Cartes/Rares/130_Naruko.jpg" alt="Naruko" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="anohana">
            <img src="Images/Cartes/Rares/131_Atsumu.jpg" alt="Atsumu" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="anohana">
            <img src="Images/Cartes/Rares/132_Tetsudo.jpg" alt="Tetsudo" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="anohana">
            <img src="Images/Cartes/Rares/133_Chiriko.jpg" alt="Chiriko" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="black clover">
            <img src="Images/Cartes/Rares/134_Finral.jpg" alt="Finral" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="black clover">
            <img src="Images/Cartes/Rares/135_Charmy.jpg" alt="Charmy" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="black clover">
            <img src="Images/Cartes/Rares/136_Dorothy.jpg" alt="Dorothy" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="my hero academia">
            <img src="Images/Cartes/Rares/137_Momo.jpg" alt="Momo" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="the god of high school">
            <img src="Images/Cartes/Rares/138_CommissionerQ.jpg" alt="CommissionerQ"/>
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="the god of high school">
            <img src="Images/Cartes/Rares/139_Jegal.jpg" alt="Jegal" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="darling in the franxx">
            <img src="Images/Cartes/Rares/140_Kokoro.jpg" alt="Kokoro" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="darling in the franxx">
            <img src="Images/Cartes/Rares/141_Goro.jpg" alt="Goro" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="darling in the franxx">
            <img src="Images/Cartes/Rares/142_Ikuno.jpg" alt="Ikuno" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="death parade">
            <img src="Images/Cartes/Rares/143_Chiyuki.jpg" alt="Chiyuki" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="death parade">
            <img src="Images/Cartes/Rares/144_Nona.jpg" alt="Nona" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="fruits basket">
            <img src="Images/Cartes/Rares/145_Momiji.jpg" alt="Momiji" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="fruits basket">
            <img src="Images/Cartes/Rares/146_Shigure.jpg" alt="Shigure" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="fruits basket">
            <img src="Images/Cartes/Rares/147_Kyôko.jpg" alt="Kyôko" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="fruits basket">
            <img src="Images/Cartes/Rares/148_Kisa.jpg" alt="Kisa" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="fruits basket">
            <img src="Images/Cartes/Rares/149_Arisa.jpg" alt="Arisa" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="fruits basket">
            <img src="Images/Cartes/Rares/150_Saki.jpg" alt="Saki" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="fruits basket">
            <img src="Images/Cartes/Rares/151_Hatsuharu.jpg" alt="Hatsuharu" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="saint seiya">
            <img src="Images/Cartes/Rares/152_Marine.jpg" alt="Marine" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="gurren lagann">
            <img src="Images/Cartes/Rares/153_Kittan.jpg" alt="Kittan" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="gurren lagann">
            <img src="Images/Cartes/Rares/154_Rossiu.jpg" alt="Rossiu" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="gurren lagann">
            <img src="Images/Cartes/Rares/155_Viral.jpg" alt="Viral" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="horimiya">
            <img src="Images/Cartes/Rares/156_Kakeru.jpg" alt="Kakeru" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="horimiya">
            <img src="Images/Cartes/Rares/157_Kyôsuke.jpg" alt="Kyôsuke" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="horimiya">
            <img src="Images/Cartes/Rares/158_Sakura.jpg" alt="Sakura" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="horimiya">
            <img src="Images/Cartes/Rares/159_Shû.jpg" alt="Shû" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="horimiya">
            <img src="Images/Cartes/Rares/160_Honoka.jpg" alt="Honoka" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="my dress up darling">
            <img src="Images/Cartes/Rares/161_Sajuna.jpg" alt="Sajuna" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="my dress up darling">
            <img src="Images/Cartes/Rares/162_Shinju.jpg" alt="Shinju" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="re zero">
            <img src="Images/Cartes/Rares/163_Crusch.jpg" alt="Crush" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="re zero">
            <img src="Images/Cartes/Rares/164_Anastasia.jpg" alt="Anastasia" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="oshi no ko">
            <img src="Images/Cartes/Rares/165_Miyako.jpg" alt="Miyako" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="oshi no ko">
            <img src="Images/Cartes/Rares/166_Memcho.jpg" alt="Memcho" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="oshi no ko">
            <img src="Images/Cartes/Rares/167_Taishi.jpg" alt="Taishi" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="negative positive angler">
            <img src="Images/Cartes/Rares/168_Hana.jpg" alt="Hana" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="blue lock">
            <img src="Images/Cartes/Rares/169_Gagamaru.jpg" alt="Gagamaru" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="du mouvement de la terre">
            <img src="Images/Cartes/Rares/170_Schmidt.jpg" alt="Schmidt" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="du mouvement de la terre">
            <img src="Images/Cartes/Rares/171_Albert.jpg" alt="Albert" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="du mouvement de la terre">
            <img src="Images/Cartes/Rares/172_Nowak.jpg" alt="Nowak" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="solo leveling">
            <img src="Images/Cartes/Rares/173_Jin-Ho.jpg" alt="Jin-Ho" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="solo leveling">
            <img src="Images/Cartes/Rares/174_Goto.jpg" alt="Goto" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="naruto">
            <img src="Images/Cartes/Rares/175_Hidan.jpg" alt="Hidan" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="naruto">
            <img src="Images/Cartes/Rares/176_Sasori.jpg" alt="Sasori" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="naruto">
            <img src="Images/Cartes/Rares/177_Kakuzu.jpg" alt="Kakuzu"/>
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="naruto">
            <img src="Images/Cartes/Rares/178_Kushina.jpg" alt="Kushina"/>
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="dr stone">
            <img src="Images/Cartes/Rares/179_Yuzuriha.jpg" alt="yuzuriha" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="dr stone">
            <img src="Images/Cartes/Rares/180_Ginro & Kinro.jpg" alt="ginro & kinro" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="your lie in april">
            <img src="Images/Cartes/Rares/181_Hiroko.jpg" alt="hiroko"/>
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="your lie in april">
            <img src="Images/Cartes/Rares/182_Nagi.jpg" alt="nagi"/>
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="your lie in april">
            <img src="Images/Cartes/Rares/183_Emi.jpg" alt="emi"/>
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="your lie in april">
            <img src="Images/Cartes/Rares/184_Takeshi.jpg" alt="takeshi"/>
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="elfen lied">
            <img src="Images/Cartes/Rares/185_Yuka.jpg" alt="yuka" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="elfen lied">
            <img src="Images/Cartes/Rares/186_Nana.jpg" alt="nana" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="undead murder farce">
            <img src="Images/Cartes/Rares/187_Shizuku.jpg" alt="Shizuku" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="shingeki no kyojin">
            <img src="Images/Cartes/Rares/188_Annie.jpg" alt="Annie" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="shingeki no kyojin">
            <img src="Images/Cartes/Rares/189_Ymir.jpg" alt="Ymir" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="shingeki no kyojin">
            <img src="Images/Cartes/Rares/190_Bertolt.jpg" alt="Bertolt" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="">
            <img src="Images/Cartes/Rares/" alt="" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>

          <!-- COMMUNES -->

          <div class="card" data-anime="Black Clover">
            <img src="Images/Cartes/Communes/1_Vetto.jpg" alt="Vetto" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Black Clover">
            <img src="Images/Cartes/Communes/2_Sekke.jpg" alt="Sekke" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Black Clover">
            <img src="Images/Cartes/Communes/3_Gauche.jpg" alt="Gauche" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Black Clover">
            <img src="Images/Cartes/Communes/4_Klaus.jpg" alt="Klaus" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Black Clover">
            <img src="Images/Cartes/Communes/5_Marx.jpg" alt="Marx" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Black Clover">
            <img src="Images/Cartes/Communes/6_Gordon.jpg" alt="Gordon" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Citrus">
            <img src="Images/Cartes/Communes/7_Yuzu.jpg" alt="Yuzu" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Citrus">
            <img src="Images/Cartes/Communes/8_Mei.jpg" alt="Mei" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Demon Slayer">
            <img src="Images/Cartes/Communes/9_Kyogai.jpg" alt="Kyogai" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Demon Slayer">
            <img src="Images/Cartes/Communes/10_Aoi.jpg" alt="Aoi" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Demon Slayer">
            <img src="Images/Cartes/Communes/11_Murata.jpg" alt="Murata" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Naruto">
            <img src="Images/Cartes/Communes/12_Gagamatsu.jpg" alt="Gagamatsu" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Naruto">
            <img src="Images/Cartes/Communes/13_Tenten.jpg" alt="Tenten" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Naruto">
            <img src="Images/Cartes/Communes/14_Ebisu.jpg" alt="Ebisu" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Dr Stone">
            <img src="Images/Cartes/Communes/15_Soyouz.jpg" alt="Soyouz" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Goblin Slayer">
            <img src="Images/Cartes/Communes/16_Onna Shinkan.jpg" alt="Onna Shinkan"/>
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Goblin Slayer">
            <img
              src="Images/Cartes/Communes/17_Ushikai Musume.jpg"
              alt="Ushikai Musume"/>
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Fairy Tail">
            <img src="Images/Cartes/Communes/18_Taurus.jpg" alt="Taurus" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Fairy Tail">
            <img src="Images/Cartes/Communes/19_Cancer.jpg" alt="Cancer" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Fairy Tail">
            <img
              src="Images/Cartes/Communes/20_Sagittarius.jpg"
              alt="Sagitarius"
            />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="One Piece">
            <img src="Images/Cartes/Communes/21_Alvida.jpg" alt="Alvida" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="One Piece">
            <img src="Images/Cartes/Communes/22_Foxy.jpg" alt="Foxy" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="My Hero Academia">
            <img src="Images/Cartes/Communes/23_Minoru.jpg" alt="Minoru" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="My Hero Academia">
            <img src="Images/Cartes/Communes/24_Koji.jpg" alt="Koji" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="My Hero Academia">
            <img src="Images/Cartes/Communes/25_Seto.jpg" alt="Seto" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="My Hero Academia">
            <img src="Images/Cartes/Communes/26_Inko.jpg" alt="Inko" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Nagatoro">
            <img src="Images/Cartes/Communes/27_Nagatoro.jpg" alt="Nagatoro" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Bleach">
            <img src="Images/Cartes/Communes/28_Ikumi.jpg" alt="Ikumi" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Dragon Ball">
            <img src="Images/Cartes/Communes/29_Chichi.jpg" alt="Chichi" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Dragon Ball">
            <img src="Images/Cartes/Communes/30_Chaosu.jpg" alt="Chaosu" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Dragon Ball">
            <img src="Images/Cartes/Communes/31_Yajirobe.jpg" alt="Yajirobe" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Dragon Ball">
            <img src="Images/Cartes/Communes/32_Yamcha.jpg" alt="Yamcha" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Jujutsu Kaisen">
            <img src="Images/Cartes/Communes/33_Takada.jpg" alt="Takada" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Jujutsu Kaisen">
            <img src="Images/Cartes/Communes/34_Wasuke.jpg" alt="Wasuke" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Kabaneri">
            <img src="Images/Cartes/Communes/35_Ikoma.jpg" alt="Ikoma" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Hunter X Hunter">
            <img src="Images/Cartes/Communes/36_Mito.jpg" alt="Mito" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Hunter X Hunter">
            <img src="Images/Cartes/Communes/37_Senritsu.jpg" alt="Senritsu" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Guilty Crown">
            <img src="Images/Cartes/Communes/38_Shu.jpg" alt="Shu" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Guilty Crown">
            <img src="Images/Cartes/Communes/39_Ayase.jpg" alt="Ayase" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Haikyuu">
            <img src="Images/Cartes/Communes/40_Kinoshita.jpg" alt="Kinoshita" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Haikyuu">
            <img src="Images/Cartes/Communes/41_Narita.jpg" alt="Narita" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Haikyuu">
            <img src="Images/Cartes/Communes/42_Ennoshita.jpg" alt="Ennoshita" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Shingeki no Kyojin">
            <img src="Images/Cartes/Communes/43_Mina.jpg" alt="Mina" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Shingeki no Kyojin">
            <img src="Images/Cartes/Communes/44_Anka.jpg" alt="Anka" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Shingeki no Kyojin">
            <img src="Images/Cartes/Communes/45_Daz.jpg" alt="Daz" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Shingeki no Kyojin">
            <img
              src="Images/Cartes/Communes/46_Pasteur Nick.jpg"
              alt="Pasteur Nick"
            />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Mirai Nikki">
            <img src="Images/Cartes/Communes/47_Minene.jpg" alt="Minene" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Mirai Nikki">
            <img src="Images/Cartes/Communes/48_Aru.jpg" alt="Aru" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Steins Gate">
            <img src="Images/Cartes/Communes/49_Mayuri.jpg" alt="Mayuri" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Steins Gate">
            <img src="Images/Cartes/Communes/50_Itaru.jpg" alt="Itaru" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Takt op Destiny">
            <img src="Images/Cartes/Communes/51_Hell.jpg" alt="Hell" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Takt op Destiny">
            <img src="Images/Cartes/Communes/52_Titan.jpg" alt="Titan" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Wonder egg priority">
            <img src="Images/Cartes/Communes/53_Neiru.jpg" alt="Neiru" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Wonder egg priority">
            <img src="Images/Cartes/Communes/54_Rika.jpg" alt="Rika" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Wonder egg priority">
            <img src="Images/Cartes/Communes/55_Momoe.jpg" alt="Momoe" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="naruto">
            <img src="Images/Cartes/Communes/56_Zaku.jpg" alt="Zaku" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="naruto">
            <img src="Images/Cartes/Communes/57_Dosu.jpg" alt="Dosu" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="Another">
            <img src="Images/Cartes/Communes/58_Koichi.jpg" alt="Koichi" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="charlotte">
            <img src="Images/Cartes/Communes/59_Nao.jpg" alt="Nao" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="charlotte">
            <img src="Images/Cartes/Communes/60_Yuu.jpg" alt="Yuu" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="dororo">
            <img src="Images/Cartes/Communes/61_Dororo.jpg" alt="Dororo" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akira">
            <img src="Images/Cartes/Communes/62_Tetsuo.jpg" alt="Tetsuo" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="soul eater">
            <img src="Images/Cartes/Communes/63_Shinigami.jpg" alt="Shinigami" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="soul eater">
            <img
              src="Images/Cartes/Communes/64_Soeurs Thompson.jpg"
              alt="Soeurs Thompson"
            />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="soul eater">
            <img src="Images/Cartes/Communes/65_Crona.jpg" alt="Crona" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="les carnets de l'apothicaire">
            <img src="Images/Cartes/Communes/66_Lakan.jpg" alt="Lakan" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="violet evergarden">
            <img src="Images/Cartes/Communes/67_Cattleya.jpg" alt="Cattleya" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="sword art online">
            <img src="Images/Cartes/Communes/68_Sachi.jpg" alt="Sachi" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="sword art online">
            <img src="Images/Cartes/Communes/69_Agil.jpg" alt="Agil" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="sword art online">
            <img src="Images/Cartes/Communes/70_Yui.jpg" alt="Yui" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="sword art online">
            <img src="Images/Cartes/Communes/71_Silica.jpg" alt="Silica" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="high school of the dead">
            <img src="Images/Cartes/Communes/72_Shizuka.jpg" alt="Shizuka" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="high school of the dead">
            <img src="Images/Cartes/Communes/73_Kohta.jpg" alt="Kohta" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="nana">
            <img src="Images/Cartes/Communes/74_Nobuo.jpg" alt="Nobuo" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="nana">
            <img src="Images/Cartes/Communes/75_Shin'ichi.jpg" alt="Shin'ichi" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="blue lock">
            <img src="Images/Cartes/Communes/76_Igarashi.jpg" alt="Igarashi" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="blue lock">
            <img src="Images/Cartes/Communes/77_Kuon.jpg" alt="Kuon" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="blue lock">
            <img src="Images/Cartes/Communes/78_Naruhaya.jpg" alt="Naruhaya" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="jojo's bizarre adventure">
            <img src="Images/Cartes/Communes/79_Thunder McQueen.jpg" alt="Thunder McQueen"/>
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="one piece">
            <img src="Images/Cartes/Communes/80_Morgan.jpg" alt="Morgan" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="one piece">
            <img src="Images/Cartes/Communes/81_Kuina.jpg" alt="Kuina" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="one piece">
            <img src="Images/Cartes/Communes/82_Conis.jpg" alt="Conis" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="one piece">
            <img src="Images/Cartes/Communes/83_Fullbody.jpg" alt="Fullbody" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="one punch man">
            <img
              src="Images/Cartes/Communes/84_Mumen Rider.jpg"
              alt="Mumen Rider"
            />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="one punch man">
            <img src="Images/Cartes/Communes/85_Bogoss.jpg" alt="Bogoss" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="one punch man">
            <img src="Images/Cartes/Communes/86_King.jpg" alt="King" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="assassination classroom">
            <img src="Images/Cartes/Communes/87_Ryôma.jpg" alt="Ryoma" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="hunter x hunter">
            <img src="Images/Cartes/Communes/88_Tompa.jpg" alt="Tompa" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="hunter x hunter">
            <img src="Images/Cartes/Communes/89_Podongo.jpg" alt="Podongo" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="les carnets de l'apothicaire">
            <img src="Images/Cartes/Communes/90_Lishu.jpg" alt="Lishu" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="les carnets de l'apothicaire">
            <img src="Images/Cartes/Communes/91_Guen.jpg" alt="Guen" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akatsuki no yona">
            <img src="Images/Cartes/Communes/92_Abi.jpg" alt="Abi" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akatsuki no yona">
            <img src="Images/Cartes/Communes/93_Granny.jpg" alt="Granny" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akatsuki no yona">
            <img src="Images/Cartes/Communes/94_Ao.jpg" alt="Ao" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="akatsuki no yona">
            <img
              src="Images/Cartes/Communes/95_Ao(Écureuil).jpg"
              alt="Ao ecureuil"
            />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="kuroko's basket">
            <img src="Images/Cartes/Communes/96_Sakamoto.jpg" alt="Sakamoto" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="kuroko's basket">
            <img src="Images/Cartes/Communes/97_Toyama.jpg" alt="Toyama" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="higurashi no naku koro ni">
            <img src="Images/Cartes/Communes/98_Satoko.jpg" alt="Satoko" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="umineko no naku koro ni">
            <img src="Images/Cartes/Communes/99_Maria.jpg" alt="Maria" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="metallic rouge">
            <img src="Images/Cartes/Communes/100_Eden.jpg" alt="Eden" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="one piece">
            <img src="Images/Cartes/Communes/101_Hermep.jpg" alt="Hermep" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="food wars">
            <img src="Images/Cartes/Communes/102_Zenji.jpg" alt="Zenji" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="deca dence">
            <img src="Images/Cartes/Communes/103_Kurenai.jpg" alt="Kurenai" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="deca dence">
            <img src="Images/Cartes/Communes/104_Linmei.jpg" alt="Linmei" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="mieruko chan">
            <img src="Images/Cartes/Communes/105_Zen.jpg" alt="Zen" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="black clover">
            <img src="Images/Cartes/Communes/106_Bell.jpg" alt="Bell" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="black clover">
            <img src="Images/Cartes/Communes/107_Lily.jpg" alt="Lily" />
            <div class="card-content">
              <h2 class="card-title">3/3</h2>
            </div>
          </div>
          <div class="card" data-anime="the god of high school">
            <img src="Images/Cartes/Communes/108_Miseon.jpg" alt="Miseon" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="darling in the franxx">
            <img src="Images/Cartes/Communes/109_Nana.jpg" alt="Nana" />
            <div class="card-content">
              <h2 class="card-title">2/3</h2>
            </div>
          </div>
          <div class="card" data-anime="saint seiya">
            <img src="Images/Cartes/Communes/110_Ichi.jpg" alt="Ichi" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="gurren lagann">
            <img src="Images/Cartes/Communes/111_Boota.jpg" alt="Boota" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="gurren lagann">
            <img
              src="Images/Cartes/Communes/112_Vieux Coco.jpg"
              alt="Vieux Coco"
            />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="nier automata">
            <img src="Images/Cartes/Communes/113_Pascal.jpg" alt="Pascal" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="horimiya">
            <img src="Images/Cartes/Communes/114_Motoko.jpg" alt="Motoko" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="horimiya">
            <img src="Images/Cartes/Communes/115_Souta.jpg" alt="Souta" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="re zero">
            <img
              src="Images/Cartes/Communes/116_Patrasche.jpg"
              alt="116_Patrasche"
            />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="oshi no ko">
            <img src="Images/Cartes/Communes/117_Yuki.jpg" alt="Yuki" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="oshi no ko">
            <img src="Images/Cartes/Communes/118_Frill.jpg" alt="Frill" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="fairy tail">
            <img src="Images/Cartes/Communes/119_Aries.jpg" alt="Aries" />
            <div class="card-content">
              <h2 class="card-title">1/3</h2>
            </div>
          </div>
          <div class="card" data-anime="fairy tail">
            <img src="Images/Cartes/Communes/120_Horologium.jpg" alt="Horologium" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="fairy tail">
            <img src="Images/Cartes/Communes/121_Nikola.jpg" alt="Nikola" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="demon slayer">
            <img src="Images/Cartes/Communes/122_Frère Araignée.jpg" alt="Frère Araignée" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="demon slayer">
            <img src="Images/Cartes/Communes/123_Père Araignée.jpg" alt="Père Araignée" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="negative positive angler">
            <img src="Images/Cartes/Communes/124_Ice.jpg" alt="Ice" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="negative positive angler">
            <img src="Images/Cartes/Communes/125_Fujishiro.jpg" alt="Fujishiro" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="du mouvement de la terre">
            <img src="Images/Cartes/Communes/126_Gras.jpg" alt="Gras" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="du mouvement de la terre">
            <img src="Images/Cartes/Communes/127_Kolbe.jpg" alt="Kolbe" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="du mouvement de la terre">
            <img src="Images/Cartes/Communes/128_Potocki.jpg" alt="Potocki" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="solo leveling">
            <img src="Images/Cartes/Communes/129_Akari.jpg" alt="Akari" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="dr stone">
            <img src="Images/Cartes/Communes/130_Ibara.jpg" alt="ibara" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="dr stone">
            <img src="Images/Cartes/Communes/131_Yo.jpg" alt="yo" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="dr stone">
            <img src="Images/Cartes/Communes/132_Amaryllis.jpg" alt="amaryllis" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="your lie in april">
            <img src="Images/Cartes/Communes/133_Saitô.jpg" alt="saito" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="your lie in april">
            <img src="Images/Cartes/Communes/134_Koharu.jpg" alt="koharu" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="your lie in april">
            <img src="Images/Cartes/Communes/135_Saki.jpg" alt="saki" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="your lie in april">
            <img src="Images/Cartes/Communes/136_Nao.jpg" alt="nao" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="elfen lied">
            <img src="Images/Cartes/Communes/137_Kurama.jpg" alt="Kurama" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="elfen lied">
            <img src="Images/Cartes/Communes/138_Mayu.jpg" alt="Mayu" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="undead murder farce">
            <img src="Images/Cartes/Communes/139_Annie.jpg" alt="Annie" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="shingeki no kyojin">
            <img src="Images/Cartes/Communes/140_Nanaba.jpg" alt="Nanaba" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
          <div class="card" data-anime="">
            <img src="Images/Cartes/Communes/" alt="" />
            <div class="card-content">
              <h2 class="card-title">0/3</h2>
            </div>
          </div>
      </div>
      
    </main>
    <footer>
      <p>© 2024 - Rasengan</p>
      <a href="https://discord.gg/kyfQZbnkjy" target="_blank"> Rejoindre</a>
    </footer>
    <script src="./js/main.js"></script>
  </body>
</html>