<?php

use App\Repository\RareteRepository;
use App\Repository\UtilisateursRepository;

require_once 'src/Repository/RareteRepository.php';
require_once 'src/Repository/UtilisateursRepository.php';

$rareteRepo = new RareteRepository($pdo);
$raretes = $rareteRepo->getAllRaretes();

$userRepo = new UtilisateursRepository($pdo);
$users = $userRepo->getAllUsers();

$message = $_SESSION['message'] ?? '';

try {
    $stmt = $pdo->prepare("SELECT id, pseudo FROM utilisateurs ORDER BY pseudo ASC");
    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $users = [];
}

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


