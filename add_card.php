<?php
// En-tête pour s'assurer que le script est appelé
error_log("Script add_card.php appelé à " . date('Y-m-d H:i:s') . " par " . $_SERVER['REMOTE_ADDR']);

// Activer l'affichage des erreurs pour le débogage (à désactiver en production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Vérifier si l'utilisateur est connecté et est administrateur
if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
    error_log("Accès refusé : Utilisateur non autorisé ou pas admin");
    http_response_code(403);
    echo json_encode(['success' => false, 'message' => 'Accès non autorisé']);
    exit;
}

error_log("Requête reçue de : " . $_SERVER['REMOTE_ADDR']);

// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'rasengan_db';
$username = 'root'; // Change avec ton nom d'utilisateur MySQL
$password = ''; // Change avec ton mot de passe MySQL

// Connexion à la base de données
$conn = new mysqli($host, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    error_log("Échec de la connexion à la base de données : " . $conn->connect_error);
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Échec de la connexion à la base de données']);
    exit;
}

error_log("Connexion à la base de données réussie");

// Vérifier si les données du formulaire sont bien envoyées
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    error_log("Méthode non autorisée : " . $_SERVER['REQUEST_METHOD']);
    http_response_code(405);
    echo json_encode(['success' => false, 'message' => 'Méthode non autorisée']);
    exit;
}

error_log("Données POST reçues : " . print_r($_POST, true));
error_log("Fichiers reçus : " . print_r($_FILES, true));

// Récupérer les données du formulaire
$cardName = isset($_POST['cardName']) ? trim($_POST['cardName']) : '';
$cardType = isset($_POST['cardType']) ? trim($_POST['cardType']) : '';
$cardQuantity = isset($_POST['cardQuantity']) ? (int)$_POST['cardQuantity'] : 0;
$cardDescription = isset($_POST['cardDescription']) ? trim($_POST['cardDescription']) : '';
$anime = isset($_POST['anime']) ? trim($_POST['anime']) : '';

// Validation des données
if (empty($cardName) || empty($cardType) || $cardQuantity <= 0 || $cardType !== 'anime' || empty($anime)) {
    error_log("Validation échouée : cardName='$cardName', cardType='$cardType', cardQuantity='$cardQuantity', anime='$anime'");
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Données du formulaire invalides']);
    exit;
}

error_log("Validation réussie pour : cardName='$cardName', cardType='$cardType', cardQuantity='$cardQuantity', anime='$anime'");

// Gestion de l'upload de l'image
$imagePath = '';
if (isset($_FILES['cardImage']) && $_FILES['cardImage']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = 'Images/Cartes/Events/';
    $imageName = uniqid() . '_' . basename($_FILES['cardImage']['name']);
    $imagePath = $uploadDir . $imageName;

    // Créer le dossier si nécessaire
    if (!is_dir($uploadDir)) {
        if (!mkdir($uploadDir, 0777, true)) {
            error_log("Échec de la création du dossier : $uploadDir");
            http_response_code(500);
            echo json_encode(['success' => false, 'message' => 'Échec de la création du dossier']);
            exit;
        }
    }

    // Déplacer le fichier uploadé
    if (!move_uploaded_file($_FILES['cardImage']['tmp_name'], $imagePath)) {
        error_log("Échec de l'upload de l'image : " . $_FILES['cardImage']['error']);
        http_response_code(500);
        echo json_encode(['success' => false, 'message' => "Échec de l'upload de l'image"]);
        exit;
    }
    error_log("Image uploadée avec succès : $imagePath");
} else {
    $imagePath = 'Images/Cartes/Events/default.jpg'; // Image par défaut si aucune image n'est uploadée
    error_log("Aucune image uploadée ou erreur lors de l'upload, utilisation de l'image par défaut : $imagePath");
}

// Insérer la carte dans la base de données
$sql = "INSERT INTO cartes_animes (nom, anime, rarete, image_path, description, quantite, proprietaire, created_at) VALUES (?, ?, 'events', ?, ?, ?, NULL, NOW())";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    error_log("Échec de la préparation de la requête : " . $conn->error);
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => 'Échec de la préparation de la requête']);
    exit;
}

$stmt->bind_param('ssssis', $cardName, $anime, $imagePath, $cardDescription, $cardQuantity);

if ($stmt->execute()) {
    error_log("Carte ajoutée avec succès : $cardName, $anime, $imagePath, $cardQuantity");
    echo json_encode(['success' => true, 'message' => 'Carte ajoutée avec succès']);
} else {
    error_log("Échec de l'insertion dans la base : " . $stmt->error);
    http_response_code(500);
    echo json_encode(['success' => false, 'message' => "Échec de l'ajout de la carte : " . $stmt->error]);
}

$stmt->close();
$conn->close();
?>