<?php
// D'abord charger toutes les dépendances nécessaires
require_once 'src/Initialisation/session_Auth.php';
require_once 'src/config/database.php';              // initialise $pdo
require_once 'src/Repository/CarteAnimeRepository.php';
require_once 'src/services/load_data.php';           // initialise $raretes, $users, $message
require_once 'src/services/process_card_inventory.php';
require_once 'src/services/process_card_addition.php';
require_once 'src/Initialisation/bootstrap.php';     // contient potentiellement l'auth
require_once 'src/Repository/AnimeRepository.php';
require_once 'src/Repository/FilmsRepository.php';

use Repository\AnimeRepository;
use Repository\FilmsRepository;


requireLogin();
$typeAjout = $_POST['cardTypeAjout'] ?? '';


$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
if (!$is_admin) {
    error_log("Utilisateur " . ($_SESSION['pseudo'] ?? 'inconnu') . " n'est pas administrateur.");
}

$animeRepo = new AnimeRepository($pdo);
$filmRepo = new FilmsRepository($pdo);

$animes = $animeRepo->getAllAnime();
$films = $filmRepo->getAllFilm();

$mediaList = [];

// Ajouter tous les animés
foreach ($animes as $anime) {
    $mediaList[] = [
        'type' => 'anime',
        'nom' => $anime->getNom()
    ];
}

// Ajouter tous les films
foreach ($films as $film) {
    $mediaList[] = [
        'type' => 'film',
        'nom' => $film->getNom()
    ];
}
?>

<!-- HTML ci-dessous, sans JavaScript, formulaire 100% PHP -->
<!-- La suite du code HTML de votre formulaire est conservée identique à ce que vous avez mis -->
<!-- Les select sont conditionnés par la soumission du formulaire (submit partiel ou complet) -->

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/catalogue.css">
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:wght@100..900&family=Poppins:wght@100..900&display=swap" rel="stylesheet">
    <title>Rasengan - Gestion des cartes</title>
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
                    <li><span class="welcome-message">Bienvenue, <?= htmlspecialchars($_SESSION['pseudo'], ENT_QUOTES, 'UTF-8') ?>!</span></li>
                    <li><a href="logout.php">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="compte.php">Connexion</a></li>
                    <li><a href="inscription.php">Inscription</a></li>
                <?php endif; ?>
            </ul>
        </div>
        <img src="./Images/burger.png" alt="Menu Hamburger" class="menu-burger">
    </nav>
</header>

<main>
    <?php if ($message): ?>
        <div class="message"><?= $message ?></div>
    <?php endif; ?>
    <h1>Gestion des cartes</h1>
    <?php if ($is_admin): ?>
        <div class="admin-panel active" id="adminPanel">
            <h3>Interface Administrateur</h3>

            <!-- Formulaire d'ajout -->
            <form id="addCardForm" method="post" enctype="multipart/form-data">
                <input type="hidden" name="formType" value="ajout">

                <h4>Ajouter une carte</h4>

                <!-- Nom du personnage -->
                <div class="form-group">
                    <label for="cardName">Personnage :</label>
                    <input type="text" id="cardName" name="cardName" required>
                </div>

                <!-- Choix de l'animé ou du film -->
                <div class="form-group">
                    <label for="cardAnime">Animé/Film :</label>
                    <input list="animeFilmList" name="cardAnime" id="cardAnime" required>
                    <datalist id="animeFilmList">
                        <?php foreach ($mediaList as $entry): ?>
                            <option value="<?= htmlspecialchars($entry['type'] . '|' . $entry['nom'], ENT_QUOTES, 'UTF-8') ?>">
                                <?= htmlspecialchars($entry['nom'], ENT_QUOTES, 'UTF-8') ?> (<?= $entry['type'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </datalist>
                </div>
                <!-- Rareté -->
                <div class="form-group">
                    <label for="cardRarete">Rareté :</label>
                    <select id="cardRarete" name="cardRarete" required>
                        <?php foreach ($raretes as $rarete): ?>
                            <option value="<?= htmlspecialchars($rarete->getId(), ENT_QUOTES, 'UTF-8') ?>">
                                <?= htmlspecialchars($rarete->getLibelle(), ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <!-- Image -->
                <div class="form-group">
                    <label for="cardImage">Image :</label>
                    <input type="file" id="cardImage" name="cardImage" accept="image/*">
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="cardDescription">Description :</label>
                    <textarea id="cardDescription" name="cardDescription" rows="1"></textarea>
                </div>

                <!-- Bouton -->
                <button type="submit">Ajouter</button>
            </form>

            <!-- Formulaire de gestion d'inventaire -->
            <form id="editCardForm" method="post">
                <input type="hidden" name="formType" value="inventaire">
                <h4>Gérer l'inventaire d'un joueur</h4>
                <div class="form-group">
                    <label for="cardAnime">Animé/Film :</label>
                    <input list="animeFilmListInventory" name="cardAnime" id="cardAnime" required>
                    <datalist id="animeFilmListInventory">
                        <?php foreach ($mediaList as $entry): ?>
                            <option value="<?= htmlspecialchars($entry['type'] . '|' . $entry['nom'], ENT_QUOTES, 'UTF-8') ?>">
                                <?= htmlspecialchars($entry['nom'], ENT_QUOTES, 'UTF-8') ?> (<?= $entry['type'] ?>)
                            </option>
                        <?php endforeach; ?>
                    </datalist>
                </div>

                <div class="form-group">
                    <label for="editCardRarete">Rareté :</label>
                    <select id="editCardRarete" name="cardRarete" required>
                        <option value="">Sélectionnez une rareté</option>
                        <?php foreach ($raretes as $rarete): ?>
                            <option value="<?= htmlspecialchars($rarete->getId(), ENT_QUOTES, 'UTF-8') ?>">
                                <?= htmlspecialchars($rarete->getLibelle(), ENT_QUOTES, 'UTF-8') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="editCardSelect">Carte :</label>
                    <select id="editCardSelect" name="cardId" required>
                        <option value="">Sélectionnez les filtres ci-dessus</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="quantity">Quantité :</label>
                    <input type="number" id="quantity" name="quantity" min="1" value="1" required>
                </div>
                <div class="form-group">
                    <button type="submit" name="action" value="give">Donner</button>
                    <button type="submit" name="action" value="remove">Enlever</button>
                </div>
            </form>
        </div>
    <?php endif; ?>
</main>
<footer>
    <p>© 2025 - Rasengan</p>
    <a href="https://discord.gg/kyfQZbnkjy" target="_blank">Rejoindre</a>
</footer>
</body>
</html>
