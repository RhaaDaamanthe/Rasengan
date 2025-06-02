<?php
global $pdo;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['action'])) {

    $nom = htmlspecialchars(trim($_POST['cardName'] ?? ''));
    $animeInput = $_POST['cardAnime'] ?? '';
    $newAnime = trim($_POST['newAnime'] ?? '');
    $newAnimeType = trim($_POST['newAnimeType'] ?? '');

    if ($animeInput === 'new' && $newAnime && in_array($newAnimeType, ['anime', 'film'])) {
        $type = $newAnimeType;
        $anime = $newAnime;
    } elseif (strpos($animeInput, '|') !== false) {
        [$type, $anime] = explode('|', $animeInput, 2);
    } else {
        $_SESSION['message'] = "<p style='color:red;'>Erreur : Choix d'animé/film invalide.</p>";
        header("Location: test.php");
        exit;
    }
    $newAnime = htmlspecialchars(trim($_POST['newAnime'] ?? ''));
    $id_rarete = htmlspecialchars(filter_input(INPUT_POST, 'cardRarete', FILTER_VALIDATE_INT) ?? 0);
    $description = htmlspecialchars(trim($_POST['cardDescription'] ?? ''));


    if ($anime === 'new' && !empty($newAnime)) {
        $anime = $newAnime;
    }

    if (!in_array($type, ['anime', 'film'])) {
        $_SESSION['message'] = "<p style='color:red;'>Erreur : Type de carte invalide.</p>";
        header("Location: test.php");
        exit;
    }

    // Vérifie rareté
    $stmt = $pdo->prepare("SELECT libelle, quantite FROM raretes WHERE id_rarete = :id_rarete");
    $stmt->execute(['id_rarete' => $id_rarete]);
    $rareteData = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$rareteData) {
        $_SESSION['message'] = "<p style='color:red;'>Erreur : Rareté invalide.</p>";
        header("Location: test.php");
        exit;
    }

    $folder = $rareteToFolder[$id_rarete] ?? 'Communes';
    $imagePath = "Images/Cartes/" . ($type === 'film' ? 'Films_' : '') . "$folder/";

    // Upload image
    if (isset($_FILES['cardImage']) && $_FILES['cardImage']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . "/../../public/" . $imagePath;
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $imageName = uniqid() . '_' . basename($_FILES['cardImage']['name']);
        $targetFile = $uploadDir . $imageName;

        if (move_uploaded_file($_FILES['cardImage']['tmp_name'], $targetFile)) {
            $imagePath .= $imageName;
        } else {
            $_SESSION['message'] = "<p style='color:red;'>Erreur lors du téléchargement de l'image.</p>";
            header("Location: test.php");
            exit;
        }
    }

    $table = $type === 'anime' ? 'cartes_animes' : 'cartes_films';
    $field = $type === 'anime' ? 'anime' : 'film';

    // Vérifie doublon
    $stmt = $pdo->prepare("SELECT id FROM $table WHERE nom = :nom AND $field = :anime AND id_rarete = :id_rarete");
    $stmt->execute(['nom' => $nom, 'anime' => $anime, 'id_rarete' => $id_rarete]);

    if ($stmt->fetch(PDO::FETCH_ASSOC)) {
        $_SESSION['message'] = "<p style='color:red;'>Erreur : Une carte identique existe déjà.</p>";
        header("Location: test.php");
        exit;
    }

    // Ajout carte
    $stmt = $pdo->prepare("INSERT INTO $table (nom, $field, id_rarete, image_path, description)
                           VALUES (:nom, :anime, :id_rarete, :image_path, :description)");

    if ($stmt->execute([
        'nom' => $nom,
        'anime' => $anime,
        'id_rarete' => $id_rarete,
        'image_path' => $imagePath,
        'description' => $description
    ])) {
        $_SESSION['message'] = "<p style='color:green;'>Carte ajoutée avec succès !</p>";
    } else {
        $_SESSION['message'] = "<p style='color:red;'>Erreur lors de l'ajout de la carte.</p>";
    }

    header("Location: test.php");
    exit;
}
