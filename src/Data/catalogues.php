<?php

// Vérification du statut admin
$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
error_log("is_admin catalogues.php : " . ($is_admin ? 'true' : 'false'));

if (!$is_admin) {
    error_log("Utilisateur " . ($_SESSION['pseudo'] ?? 'inconnu') . " n'est pas administrateur.");
}

// Récupération des animés (jointure avec la table animes pour le nom réel)
try {
    $stmt_animes = $pdo->prepare("
        SELECT a.nom AS anime, COUNT(ca.id) as card_count 
        FROM animes a 
        LEFT JOIN cartes_animes ca ON a.id = ca.id_anime 
        GROUP BY a.nom 
        ORDER BY a.nom ASC
    ");
    $stmt_animes->execute();
    $animes = $stmt_animes->fetchAll(PDO::FETCH_ASSOC);
    error_log("Animés récupérés : " . print_r($animes, true)); // Débogage
} catch (PDOException $e) {
    error_log("Erreur animes : " . $e->getMessage());
    $animes = [];
}

// Total cartes animés
try {
    $stmt_total_anime = $pdo->prepare("
        SELECT COUNT(*) as total 
        FROM cartes_animes
    ");
    $stmt_total_anime->execute();
    $total_anime_cards = $stmt_total_anime->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    error_log("Total animés : " . $total_anime_cards); // Débogage
} catch (PDOException $e) {
    error_log("Erreur total animés : " . $e->getMessage());
    $total_anime_cards = 0;
}

// Récupération des films (jointure avec la table films pour le nom réel)
try {
    $stmt_films = $pdo->prepare("
        SELECT f.nom AS film, COUNT(cf.id) as card_count 
        FROM films f 
        LEFT JOIN cartes_films cf ON f.id = cf.id_film 
        GROUP BY f.nom 
        ORDER BY f.nom ASC
    ");
    $stmt_films->execute();
    $films = $stmt_films->fetchAll(PDO::FETCH_ASSOC);
    error_log("Films récupérés : " . print_r($films, true)); // Débogage
} catch (PDOException $e) {
    error_log("Erreur films : " . $e->getMessage());
    $films = [];
}

// Total cartes films
try {
    $stmt_total_film = $pdo->prepare("
        SELECT COUNT(*) as total 
        FROM cartes_films
    ");
    $stmt_total_film->execute();
    $total_film_cards = $stmt_total_film->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
    error_log("Total films : " . $total_film_cards); // Débogage
} catch (PDOException $e) {
    error_log("Erreur total films : " . $e->getMessage());
    $total_film_cards = 0;
}