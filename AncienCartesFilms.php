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
        <img src="./Images/burger.png" alt="Menu Hamburger" class="menu-burger"/>
      </nav>
    </header>

    <main>
      <input type="text" id="searchbar" placeholder="Recherche un personnage ou un film/série."/>

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
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Mythiques/1_Dark Vador.jpg" alt="Dark Vador"/>
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
          <p class="card-description">Avoir : Palpatine, Obi-Wan, Anakin, Padmé</p>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Mythiques/2_Jinx.jpg" alt="Jinx"/>
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
          <p class="card-description"></p>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Mythiques/3_Voldemort.jpg" alt="Voldemort"/>
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
          <p class="card-description"></p>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Mythiques/4_Poudlard.jpg" alt="Poudlard"/>
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
          <p class="card-description"></p>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Mythiques/5_Ned & Catelyn Stark.jpg" alt="Ned & Catelyn Stark"/>
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
          <p class="card-description"></p>
        </div>
      </div>
      <div class="card" data-film="">
        <img src="Images/Cartes/Films_Mythiques/" alt=""/>
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
          <p class="card-description"></p>
        </div>
      </div>
      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Legendaires/1_Shrek.jpg" alt="Shrek" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Legendaires/2_Chat Potté.jpg" alt="chat potté" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Legendaires/3_L'âne.jpg" alt="l'ane" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="pirates des caraibes">
        <img src="Images/Cartes/Films_Legendaires/4_Jack Sparrow.jpg" alt="jack sparrow" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="forrest gump">
        <img src="Images/Cartes/Films_Legendaires/5_Forrest Gump.jpg" alt="forrest gump" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Legendaires/6_Manny.jpg" alt="manny" />
        <div class="card-content">
          <h2 class="card-title">1/1</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Legendaires/7_Sid.jpg" alt="sid" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="monstre et compagnie">
        <img src="Images/Cartes/Films_Legendaires/8_Bob Razowski.jpg" alt="bob razowski" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="monstre et compagnie">
        <img src="Images/Cartes/Films_Legendaires/9_Sulli.jpg" alt="sulli" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Legendaires/10_Obi-Wan Kenobi.jpg" alt="obi wan kenobi" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Legendaires/11_Anakin Skywalker.jpg" alt="anakin skywalker" />
        <div class="card-content">
          <h2 class="card-title">1/1</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Legendaires/12_Luke Skywalker.jpg" alt="luke skywalker" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Legendaires/13_Maître Yoda.jpg" alt="maitre yoda" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Legendaires/14_Vi.jpg" alt="vi" />
        <div class="card-content">
          <h2 class="card-title">1/1</h2>
        </div>
      </div>
      <div class="card" data-film="le loup de wall street">
        <img src="Images/Cartes/Films_Legendaires/15_Jordan Belfort.jpg" alt="jordan belfort" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Legendaires/16_Harry Potter.jpg" alt="Harry potter" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Legendaires/17_Ron Weasley.jpg" alt="Ron Weasley" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Legendaires/18_Hermione Granger.jpg" alt="Hermione Granger" />
        <div class="card-content">
          <h2 class="card-title">1/1</h2>
        </div>
      </div>
      <div class="card" data-film="fleabag">
        <img src="Images/Cartes/Films_Legendaires/19_Fleabag.jpg" alt="Fleabag" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="la la land">
        <img src="Images/Cartes/Films_Legendaires/20_Mia & Sebastian.jpg" alt="Mia & Sebastian" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="Léon">
        <img src="Images/Cartes/Films_Legendaires/21_Léon.jpg" alt="Léon" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="the greatest showman">
        <img src="Images/Cartes/Films_Legendaires/22_ PT Barnum.jpg" alt="PT Barnum" />
        <div class="card-content">
          <h2 class="card-title">1/1</h2>
        </div>
      </div>
      <div class="card" data-film="spirit">
        <img src="Images/Cartes/Films_Legendaires/23_Spirit.jpg" alt="Spirit" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="interstellar">
        <img src="Images/Cartes/Films_Legendaires/24_Joseph Cooper.jpg" alt="Joseph Cooper" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Legendaires/25_Tyrion Lannister.jpg" alt="Tyrion Lannister" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Legendaires/26_Daenerys Targaryen.jpg" alt="Daenerys Targaryen" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Legendaires/27_Jon Snow.jpg" alt="Jon Snow" />
        <div class="card-content">
          <h2 class="card-title">1/1</h2>
        </div>
      </div>
      <div class="card" data-film="ratatouille">
        <img src="Images/Cartes/Films_Legendaires/28_Rémy & Linguini.jpg" alt="Rémy & Linguini" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="sex education">
        <img src="Images/Cartes/Films_Legendaires/29_Otis Milburn.jpg" alt="Otis Milburn" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="sex education">
        <img src="Images/Cartes/Films_Legendaires/30_Maeve Wiley.jpg" alt="Maeve Wiley" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="vaiana">
        <img src="Images/Cartes/Films_Legendaires/31_Vaiana.jpg" alt="Vaiana" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Legendaires/32_Frodon Sacquet.jpg" alt="Frodon Sacquet" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Legendaires/33_Bilbon Sacquet.jpg" alt="Bilbon Sacquet" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Legendaires/34_Gandalf.jpg" alt="Gandalf" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>
      <div class="card" data-film="">
        <img src="Images/Cartes/Films_Legendaires/" alt="" />
        <div class="card-content">
          <h2 class="card-title">0/1</h2>
        </div>
      </div>

      <!-- EPIQUES -->

      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Epiques/1_Fiona.jpg" alt="Fiona" />
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="pirates des caraibes">
        <img src="Images/Cartes/Films_Epiques/2_Barbossa.jpg" alt="Barbossa" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="pirates des caraibes">
        <img src="Images/Cartes/Films_Epiques/3_Davy Jones.jpg" alt="Davy Jones" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="pirates des caraibes">
        <img src="Images/Cartes/Films_Epiques/4_Elizabeth Swann.jpg" alt="Elizabeth Swann" />
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="pirates des caraibes">
        <img src="Images/Cartes/Films_Epiques/5_William Turner.jpg" alt="William Turner" />
        <div class="card-content">
          <h2 class="card-title">2/2</h2>
        </div>
      </div>
      <div class="card" data-film="forrest gump">
        <img src="Images/Cartes/Films_Epiques/6_Lieutenant Dan.jpg" alt="Lientenant Dan" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Epiques/7_Ellie.jpg" alt="Ellie" />
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Epiques/8_Diego.jpg" alt="Diego" />
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Epiques/9_Scrat.jpg" alt="Scrat" />
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Epiques/10_Buck.jpg" alt="Buck" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="monstres et compagnie">
        <img src="Images/Cartes/Films_Epiques/11_Léon.jpg" alt="Léon" />
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="monstres et compagnie">
        <img src="Images/Cartes/Films_Epiques/12_Bouh.jpg" alt="Bouh" />
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Epiques/13_Chewbacca.jpg" alt="Chewbacca" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Epiques/14_Han Solo.jpg" alt="Han Solo" />
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Epiques/15_Leia Organa.jpg" alt="Leia Organa" />
        <div class="card-content">
          <h2 class="card-title">2/2</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Epiques/16_Empereur Palpatine.jpg" alt="Empereur Palpatine" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Epiques/17_Padmé Amidala.jpg" alt="Padmé Amidala" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Epiques/18_Rey Skywalker.jpg" alt="Rey Skywalker" />
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Epiques/19_Caitlyn.jpg" alt="Caitlyn" />
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Epiques/20_Vander.jpg" alt="Vander" />
        <div class="card-content">
          <h2 class="card-title">2/2</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Epiques/21_Silco.jpg" alt="Silco" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Epiques/22_Ekko.jpg" alt="Ekko" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Epiques/23_Jayce.jpg" alt="Jayce" />
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Epiques/24_Viktor.jpg" alt="Viktor" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="le loup de wall street">
        <img src="Images/Cartes/Films_Epiques/25_Naomi Lapaglia.jpg" alt="Naomi Lapaglia" />
        <div class="card-content">
          <h2 class="card-title">2/2</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Epiques/26_Hagrid.jpg" alt="Hagrid" />
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Epiques/27_Severus Rogue.jpg" alt="Severus Rogue" />
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Epiques/28_Dumbledore.jpg" alt="Dumbledore" />
        <div class="card-content">
          <h2 class="card-title">2/2</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Epiques/29_Dobby.jpg" alt="Dobby" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Epiques/30_Sirius Black.jpg" alt="Sirius Black" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Epiques/31_Drago Malfoy.jpg" alt="Malfoy" />
        <div class="card-content">
          <h2 class="card-title">2/2</h2>
        </div>
      </div>
      <div class="card" data-film="fleabag">
        <img src="Images/Cartes/Films_Epiques/32_Claire.jpg" alt="Claire" />
        <div class="card-content">
          <h2 class="card-title">2/2</h2>
        </div>
      </div>
      <div class="card" data-film="léon">
        <img src="Images/Cartes/Films_Epiques/33_Mathilda.jpg" alt="mathilda" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="the greatest showman">
        <img src="Images/Cartes/Films_Epiques/34_Phillip Carlyle.jpg" alt="phillip carlyle" />
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="spirit">
        <img src="Images/Cartes/Films_Epiques/35_Little Creek.jpg" alt="little creek" />
        <div class="card-content">
          <h2 class="card-title">2/2</h2>
        </div>
      </div>
      <div class="card" data-film="interstellar">
        <img src="Images/Cartes/Films_Epiques/36_Murphy Cooper.jpg" alt="murphy cooper" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="interstellar">
        <img src="Images/Cartes/Films_Epiques/37_Amelia Brand.jpg" alt="Amelia brand" />
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Epiques/38_Arya Stark.jpg" alt="Arya Stark"/>
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Epiques/39_Robb Stark.jpg" alt="Robb Stark"/>
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Epiques/40_Sandor Clegane.jpg" alt="Sandor Clegane"/>
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Epiques/41_Cersei Lannister.jpg" alt="Cersei Lannister"/>
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Epiques/42_Brienne de Torth.jpg" alt="Brienne de Torth"/>
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="ratatouille">
        <img src="Images/Cartes/Films_Epiques/43_Colette.jpg" alt="colette"/>
        <div class="card-content">
          <h2 class="card-title">1/2</h2>
        </div>
      </div>
      <div class="card" data-film="sex education">
        <img src="Images/Cartes/Films_Epiques/44_Eric.jpg" alt="eric"/>
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="sex education">
        <img src="Images/Cartes/Films_Epiques/45_Aimee Gibbs.jpg" alt="Aimee gibbs"/>
        <div class="card-content">
          <h2 class="card-title">2/2</h2>
        </div>
      </div>
      <div class="card" data-film="vaiana">
        <img src="Images/Cartes/Films_Epiques/46_Maui.jpg" alt="Maui"/>
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Epiques/47_Sam.jpg" alt="Sam"/>
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Epiques/48_Legolas.jpg" alt="Legolas"/>
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Epiques/49_Gimli.jpg" alt="Gimli"/>
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Epiques/50_Thorin.jpg" alt="Thorin"/>
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Epiques/51_Aragorn.jpg" alt="Aragorn"/>
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Epiques/52_Bard.jpg" alt="Bard"/>
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Epiques/53_Gollum.jpg" alt="Gollum"/>
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>
      <div class="card" data-film="">
        <img src="Images/Cartes/Films_Epiques/" alt=""/>
        <div class="card-content">
          <h2 class="card-title">0/2</h2>
        </div>
      </div>

      <!-- RARES -->

      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Rares/1_Arthur.jpg" alt="Arthur"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Rares/2_Ti-Biscuit.jpg" alt="Ti-Biscuit"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Rares/3_Dragonne.jpg" alt="Dragonne"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Rares/4_Harold & Lillian.jpg" alt="Harold & Lillian"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Rares/5_Prince Charmant.jpg" alt="Prince Charmant"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Rares/6_Pinocchio.jpg" alt="Pinocchio"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="pirates des caraibes">
        <img src="Images/Cartes/Films_Rares/7_Pintel & Ragetti.jpg" alt="Pintel & Ragetti"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="pirates des caraibes">
        <img src="Images/Cartes/Films_Rares/8_Joshamee Gibbs.jpg" alt="Joshamee Gibbs"/>
        <div class="card-content">
          <h2 class="card-title">3/3</h2>
        </div>
      </div>
      <div class="card" data-film="pirates des caraibes">
        <img src="Images/Cartes/Films_Rares/9_Bill Turner.jpg" alt="Bill Turner"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="forrest gump">
        <img src="Images/Cartes/Films_Rares/10_Jenny.jpg" alt="Jenny"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="forrest gump">
        <img src="Images/Cartes/Films_Rares/11_Bubba.jpg" alt="Bubba"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Rares/12_Crash & Eddie.jpg" alt="Crash & Eddie"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Rares/13_Mémé.jpg" alt="Mémé"/>
        <div class="card-content">
          <h2 class="card-title">2/3</h2>
        </div>
      </div>
      <div class="card" data-film="monstres et compagnie">
        <img src="Images/Cartes/Films_Rares/14_Image_Henry J. Waternoose III.jpg" alt="Henry J. Waternoose III"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="monstres et compagnie">
        <img src="Images/Cartes/Films_Rares/15_Célia Mae.jpg" alt="Célia Mae"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Rares/16_R2-D2 & C-3PO.jpg" alt="R2-D2 & C-3PO"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Rares/17_Boba Fett.jpg" alt="Boba Fett"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Rares/18_Mace Windu.jpg" alt="Mace Windu"/>
        <div class="card-content">
          <h2 class="card-title">3/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Rares/19_Jabba le Hut.jpg" alt="Jabba le Hut"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Rares/20_Jar Jar Binks.jpg" alt="Jar Jar Binks"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Rares/21_Compte Dooku.jpg" alt="Compte Dooku"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Rares/22_Dark Maul.jpg" alt="Dark Maul"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Rares/23_Général Grievous.jpg" alt="Général Grievous"/>
        <div class="card-content">
          <h2 class="card-title">3/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Rares/24_Kylo Ren.jpg" alt="Kylo Ren"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Rares/25_Finn.jpg" alt="Finn"/>
        <div class="card-content">
          <h2 class="card-title">2/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Rares/26_Qui-Gon Jinn.jpg" alt="Qui-Gon Jinn"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Rares/27_Claggor & Mylo.jpg" alt="Claggor & Mylo"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Rares/28_Mel.jpg" alt="Mel"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Rares/29_Isha.jpg" alt="Isha"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Rares/30_Heimerdinger.jpg" alt="Heimerdinger"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Rares/31_Powder.jpg" alt="Powder"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Rares/32_Ambessa.jpg" alt="Ambessa"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Rares/33_Sevika.jpg" alt="Sevika"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le loup de wall street">
        <img src="Images/Cartes/Films_Rares/34_Donnie Azoff.jpg" alt="Donnie Azoff"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="le loup de wall street">
        <img src="Images/Cartes/Films_Rares/35_Jean-Jaques Saurel.jpg" alt="Jean-Jaques Saurel"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le loup de wall street">
        <img src="Images/Cartes/Films_Rares/36_Mark Hanna.jpg" alt="Mark Hanna"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Rares/37_Cédric Diggory.jpg" alt="Cédric Diggory"/>
        <div class="card-content">
          <h2 class="card-title">3/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Rares/38_Ginny Weasley.jpg" alt="Ginny Weasley"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
            <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Rares/39_Fred & George Weasley.jpg" alt="Fred & George Weasley.jpg"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Rares/40_Arthur & Molly Weasley.jpg" alt="Arthur & Molly Weasley"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Rares/41_Bellatrix Lestrang.jpg" alt="Bellatrix Lestrang"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Rares/42_Neville Londubat.jpg" alt="Neville Londubat"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Rares/43_Luna Lovegood.jpg" alt="Luna Lovegood"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Rares/44_Lucius Malfoy.jpg" alt="Lucius Malfoy"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="fleabag">
        <img src="Images/Cartes/Films_Rares/45_Le prêtre.jpg" alt="Le prêtre"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="fleabag">
        <img src="Images/Cartes/Films_Rares/46_Le père.jpg" alt="Le père"/>
        <div class="card-content">
          <h2 class="card-title">2/3</h2>
        </div>
      </div>
      <div class="card" data-film="fleabag">
        <img src="Images/Cartes/Films_Rares/47_Harry.jpg" alt="Harry"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="léon">
        <img src="Images/Cartes/Films_Rares/48_Norman Stansfield.jpg" alt="norman stansfield"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="the greatest showman">
        <img src="Images/Cartes/Films_Rares/49_Charity Barnum.jpg" alt="charity barnum"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="the greatest showman">
        <img src="Images/Cartes/Films_Rares/50_Caroline & Helen B.jpg" alt="caroline & helen b"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="the greatest showman">
        <img src="Images/Cartes/Films_Rares/51_Anne Wheeler.jpg" alt="anne wheeler"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="the greatest showman">
        <img src="Images/Cartes/Films_Rares/52_Lettie Lutz.jpg" alt="lettie lutz"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="spirit">
        <img src="Images/Cartes/Films_Rares/53_Rivière.jpg" alt="rivière"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="interstellar">
        <img src="Images/Cartes/Films_Rares/54_Tom Cooper.jpg" alt="tom cooper"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="interstellar">
        <img src="Images/Cartes/Films_Rares/55_John Brand.jpg" alt="john brand"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Rares/56_Osha.jpg" alt="Osha"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Rares/57_Bran Stark.jpg" alt="Bran Stark"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Rares/58_Sansa Stark.jpg" alt="Sansa Stark"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Rares/59_Jorah Mormont.jpg" alt="Jorah Mormont"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Rares/60_Tormund.jpg" alt="Tormund"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Rares/61_Ramsay Bolton.jpg" alt="Ramsay Bolton"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Rares/62_Tywin Lannister.jpg" alt="Tywin Lannister"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Rares/63_Theon Greyjoy.jpg" alt="Theon Greyjoy"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Rares/64_Pêche.jpg" alt="Pêche"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="ratatouille">
        <img src="Images/Cartes/Films_Rares/65_Skinner.jpg" alt="Skinner"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="ratatouille">
        <img src="Images/Cartes/Films_Rares/66_Émile.jpg" alt="Émile"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="ratatouille">
        <img src="Images/Cartes/Films_Rares/67_Anton Ego.jpg" alt="Anton ego"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="ratatouille">
        <img src="Images/Cartes/Films_Rares/68_Gusteau.jpg" alt="Gusteau"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="sex education">
        <img src="Images/Cartes/Films_Rares/69_Jean Milburn.jpg" alt="Jean Milburn"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="sex education">
        <img src="Images/Cartes/Films_Rares/70_Ruby.jpg" alt="Ruby"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="sex education">
        <img src="Images/Cartes/Films_Rares/71_Jackson Marchetti.jpg" alt="Jackson Marchetti"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="sex education">
        <img src="Images/Cartes/Films_Rares/72_Adam Groff.jpg" alt="Adam Groff"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="sex education">
        <img src="Images/Cartes/Films_Rares/73_Michael Groff.jpg" alt="Michael groff"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="vaiana">
        <img src="Images/Cartes/Films_Rares/74_Tala.jpg" alt="tala"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="vaiana">
        <img src="Images/Cartes/Films_Rares/75_Hei Hei.jpg" alt="hei hei"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Rares/76_Faramir.jpg" alt="faramir"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Rares/77_Tauriel.jpg" alt="tauriel"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Rares/78_Saroumane.jpg" alt="saroumane"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Rares/79_Pippin & Merry.jpg" alt="pippin & merry"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Rares/80_Boromir.jpg" alt="boromir"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Rares/81_Kili.jpg" alt="kili"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Rares/82_Éomer.jpg" alt="éomer"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Rares/83_Balin.jpg" alt="balin"/>
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Rares/84_Éowyn.jpg" alt="éowyn"/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="">
        <img src="Images/Cartes/Films_Rares/" alt=""/>
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>

      <!-- COMMUNES -->

      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Communes/1_Merlin.jpg" alt="Merlin" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Communes/2_Steve & Ed.jpg" alt="Steve & Ed" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Communes/3_La bonne Fée.jpg" alt="La bonne fée" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Communes/4_Doris.jpg" alt="Doris" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Communes/5_FILS DE Shrek.jpg" alt="FILS DE Shrek" />
        <div class="card-content">
          <h2 class="card-title">2/3</h2>
        </div>
      </div>
      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Communes/6_Grand méchant Loup.jpg" alt="Grand méchant Loup" />
        <div class="card-content">
          <h2 class="card-title">3/3</h2>
        </div>
      </div>
      <div class="card" data-film="shrek">
        <img src="Images/Cartes/Films_Communes/7_Les 3 petits cochons.jpg" alt="Les 3 petits cochons" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="pirates des caraibes">
        <img src="Images/Cartes/Films_Communes/8_Jack.jpg" alt="Jack" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="pirates des caraibes">
        <img src="Images/Cartes/Films_Communes/9_James Norrington.jpg" alt="James Norrington" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Communes/10_Roshan.jpg" alt="Roshan" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Communes/11_Brooke.jpg" alt="Brooke" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Communes/12_Louis.jpg" alt="Louis" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Communes/13_Dodo.jpg" alt="Dodo" />
        <div class="card-content">
          <h2 class="card-title">2/3</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Communes/14_Hamster.jpg" alt="Hamster" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>      <div class="card" data-film="monstres et compagnie">
        <img src="Images/Cartes/Films_Communes/15_Germaine.jpg" alt="Germaine" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="monstres et compagnie">
        <img src="Images/Cartes/Films_Communes/16_Yéti.jpg" alt="Yéti" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="monstres et compagnie">
        <img src="Images/Cartes/Films_Communes/17_George Sanderso.jpg" alt="George Sanderso" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Communes/18_Wampa.jpg" alt="Wampa" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Communes/19_Droides.jpg" alt="Droides" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Communes/20_Clones.jpg" alt="Clones" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Communes/21_Ewok.jpg" alt="Ewok" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Communes/22_Capitaine Phasma.jpg" alt="Capitaine Phasma" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Communes/23_BB8.jpg" alt="BB8" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Communes/24_Lando Calrissian.jpg" alt="Lando Calrissian" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="star wars">
        <img src="Images/Cartes/Films_Communes/25_Poe Dameron.jpg" alt="Poe Dameron" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Communes/26_Smeech.jpg" alt="Smeech" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Communes/27_Maddie.jpg" alt="Maddie" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Communes/28_Benzo.jpg" alt="Benzo" />
        <div class="card-content">
          <h2 class="card-title">2/3</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Communes/29_Grayson.jpg" alt="Grayson" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Communes/30_Huck.jpg" alt="Huck" />
        <div class="card-content">
          <h2 class="card-title">3</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Communes/31_Cassandra.jpg" alt="Cassandra" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="arcane">
        <img src="Images/Cartes/Films_Communes/32_Loris.jpg" alt="Loris" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="le loup de wall street">
        <img src="Images/Cartes/Films_Communes/33_Teresa Petrillo.jpg" alt="Teresa Petrillo" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="le loup de wall street">
        <img src="Images/Cartes/Films_Communes/34_Patrick Denham.jpg" alt="Patrick Denham" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Communes/35_Quirrell.jpg" alt="Guirrell" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Communes/36_Sybille Trelawney.jpg" alt="Sybille Trelawney" />
        <div class="card-content">
          <h2 class="card-title">3/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Communes/37_Fleur Delacour.jpg" alt="Fleur Delacour" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Communes/38_Peter Pettigrow.jpg" alt="Peter Pettigrow" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Communes/39_Mimi Geignarde.jpg" alt="Mimi Geignarde" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Communes/40_Rusard.jpg" alt="Rusard" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Communes/41_Gilderoy Lockhart.jpg" alt="Gilderoy Lockhart" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Communes/42_Fuck Dursley.jpg" alt="Fuck Dursley" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Communes/43_Narcissa Malefoy.jpg" alt="Narcissa Malefoy" />
        <div class="card-content">
          <h2 class="card-title">3/3</h2>
        </div>
      </div>
      <div class="card" data-film="harry potter">
        <img src="Images/Cartes/Films_Communes/44_Cho Chang.jpg" alt="Cho Chang" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="fleabag">
        <img src="Images/Cartes/Films_Communes/45_Boo.jpg" alt="Boo" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="fleabag">
        <img src="Images/Cartes/Films_Communes/46_La belle mère.jpg" alt="La belle mère" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="fleabag">
        <img src="Images/Cartes/Films_Communes/47_Martin.jpg" alt="Martin" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="the greatest showman">
        <img src="Images/Cartes/Films_Communes/48_James Gordon.jpg" alt="James Gordon" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="the greatest showman">
        <img src="Images/Cartes/Films_Communes/49_Lord of Leeds.jpg" alt="Lord of Leeds" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="interstellar">
        <img src="Images/Cartes/Films_Communes/50_Dr Mann.jpg" alt="Dr Mann" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="interstellar">
        <img src="Images/Cartes/Films_Communes/51_Romilly.jpg" alt="Romilly" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Communes/52_Hodor.jpg" alt="hodor" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="game of thrones">
        <img src="Images/Cartes/Films_Communes/53_Rickon Stark.jpg" alt="rickon stark" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Communes/54_Capitaine Gutt.jpg" alt="Capitaine gutt" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="l'age de glace">
        <img src="Images/Cartes/Films_Communes/55_Scratina.jpg" alt="Scratina" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="ratatouille">
        <img src="Images/Cartes/Films_Communes/56_Django.jpg" alt="Django" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="ratatouille">
        <img src="Images/Cartes/Films_Communes/57_Horst.jpg" alt="Horst" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="ratatouille">
        <img src="Images/Cartes/Films_Communes/58_Mabel.jpg" alt="Mabel" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="sex education">
        <img src="Images/Cartes/Films_Communes/59_Emily Sands.jpg" alt="Emily Sands" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="sex education">
        <img src="Images/Cartes/Films_Communes/60_Colin Hendricks.jpg" alt="Colin Hendricks" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>

      <div class="card" data-film="sex education">
        <img src="Images/Cartes/Films_Communes/61_Rahim.jpg" alt="Rahim" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="sex education">
        <img src="Images/Cartes/Films_Communes/62_Maureen Groff.jpg" alt="Maureen Groff" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="sex education">
        <img src="Images/Cartes/Films_Communes/63_Isaac.jpg" alt="Isacc" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="vaiana">
        <img src="Images/Cartes/Films_Communes/64_Siméa.jpg" alt="Siméa" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="vaiana">
        <img src="Images/Cartes/Films_Communes/65_Pua.jpg" alt="Pua" />
        <div class="card-content">
          <h2 class="card-title">1/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Communes/66_Gothmog.jpg" alt="Gothmog" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Communes/67_Ori.jpg" alt="Ori" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Communes/68_Bofur.jpg" alt="Bofur" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Communes/69_Denethor.jpg" alt="Denethor" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Communes/70_Beorn.jpg" alt="Beorn" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Communes/71_Grima.jpg" alt="Grima" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Communes/72_Alfrid.jpg" alt="Alfrid" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="le seigneur des anneaux">
        <img src="Images/Cartes/Films_Communes/73_Le Roi Gobelin.jpg" alt="Le roi Gobelin" />
        <div class="card-content">
          <h2 class="card-title">0/3</h2>
        </div>
      </div>
      <div class="card" data-film="">
        <img src="Images/Cartes/Films_Communes/" alt="" />
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