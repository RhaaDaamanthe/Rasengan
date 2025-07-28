<?php
use App\Repository\RareteRepository;

require_once __DIR__ . '/session_Auth.php';
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../Repository/CarteAnimeRepository.php';

$carteAnimeDAO = new RareteRepository($pdo);
$raretes = $carteAnimeDAO->getAllRaretes();

// Récupérer les utilisateurs
try {
    $stmt = $pdo->prepare("SELECT id, pseudo FROM utilisateurs ORDER BY pseudo ASC");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Erreur lors de la récupération des utilisateurs : " . $e->getMessage());
    $users = [];
}

// Récupérer les animés et films
try {
    $stmt = $pdo->prepare("SELECT DISTINCT LOWER(TRIM(anime)) AS anime FROM cartes_animes ORDER BY anime ASC");
    $stmt->execute();
    $animes = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    $animes = [];
}

try {
    $stmt = $pdo->prepare("SELECT DISTINCT LOWER(TRIM(film)) AS film FROM cartes_films ORDER BY film ASC");
    $stmt->execute();
    $films = $stmt->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $e) {
    $films = [];
}

// Raretés => dossiers images
$rareteToFolder = [
    1 => 'Communes',
    2 => 'Rares',
    3 => 'Epiques',
    4 => 'Legendaires',
    5 => 'Mythiques',
    6 => 'Events'
];
