<?php
/** @var array $cartes */
$page_active = 'catalogue';
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cartes Animés - Catalogue</title>
    <link rel="stylesheet" href="/Css/styles.css">
    <!-- <link rel="stylesheet" href="/Css/catalogue.css"> -->
    <link rel="stylesheet" href="/Css/header.css">
    <link rel="stylesheet" href="/Css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"/>
</head>
<body>
<?php require_once __DIR__ . '/../Partials/header.php'; ?>

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
    <?php foreach ($cartes as $carte): ?>
        <div class="card" data-anime="<?= htmlspecialchars($carte->getAnime()->getNom()) ?>" data-rarete="<?= $carte->getRarete()->getId() ?>">
            <a href="/catalogue/anime/carte/<?= $carte->getId() ?>">
                <img src="/<?= htmlspecialchars($carte->getImagePath()) ?>" alt="<?= htmlspecialchars($carte->getNom()) ?>">
            </a>
            <div class="card-content">
                <h2 class="card-title"><?= htmlspecialchars($carte->getNom()) ?></h2>
                <p class="card-description"><?= htmlspecialchars($carte->getDescription()) ?></p>

                <?php if (!empty($carte->getInfoSup())): ?>
                    <p class="card-extra"><?= htmlspecialchars($carte->getInfoSup()) ?></p>
                <?php endif; ?>

                <?php if ($carte->getOwners()): ?>
                    <p class="owners">Propriétaires : <?= htmlspecialchars(implode(', ', $carte->getOwners())) ?></p>
                <?php endif; ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</main>
<footer>
    <p>© 2024 - Rasengan</p>
    <a href="https://discord.gg/kyfQZbnkjy" target="_blank">Rejoindre</a>
</footer>
<!-- <?php require_once __DIR__ . '/Partials/footer.php'; ?> -->
<script src="/Js/main.js"></script>
<script src="/Js/utilisateurs_cartes.js"></script>
</body>
</html>
