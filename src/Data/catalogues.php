<?php

// Vérification du statut admin
$is_admin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
error_log("is_admin catalogues.php : " . ($is_admin ? 'true' : 'false'));

if (!$is_admin) {
    error_log("Utilisateur " . ($_SESSION['pseudo'] ?? 'inconnu') . " n'est pas administrateur.");
}

// Récupération des animés
try {
    $stmt_animes = $pdo->prepare("
        SELECT LOWER(TRIM(anime)) AS anime, COUNT(*) as card_count 
        FROM cartes_animes 
        GROUP BY LOWER(TRIM(anime)) 
        ORDER BY anime ASC
    ");
    $stmt_animes->execute();
    $animes = $stmt_animes->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Erreur animes : " . $e->getMessage());
    $animes = [];
}

// Total cartes animés
try {
    $stmt_total_anime = $pdo->prepare("
        SELECT SUM(card_count) as total 
        FROM (SELECT COUNT(*) as card_count FROM cartes_animes GROUP BY LOWER(TRIM(anime))) AS subquery
    ");
    $stmt_total_anime->execute();
    $total_anime_cards = $stmt_total_anime->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
} catch (PDOException $e) {
    error_log("Erreur total animés : " . $e->getMessage());
    $total_anime_cards = 0;
}

// Récupération des films
try {
    $stmt_films = $pdo->prepare("
        SELECT LOWER(TRIM(film)) AS film, COUNT(*) as card_count 
        FROM cartes_films 
        GROUP BY LOWER(TRIM(film)) 
        ORDER BY film ASC
    ");
    $stmt_films->execute();
    $films = $stmt_films->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    error_log("Erreur films : " . $e->getMessage());
    $films = [];
}

// Total cartes films
try {
    $stmt_total_film = $pdo->prepare("
        SELECT SUM(card_count) as total 
        FROM (SELECT COUNT(*) as card_count FROM cartes_films GROUP BY LOWER(TRIM(film))) AS subquery
    ");
    $stmt_total_film->execute();
    $total_film_cards = $stmt_total_film->fetch(PDO::FETCH_ASSOC)['total'] ?? 0;
} catch (PDOException $e) {
    error_log("Erreur total films : " . $e->getMessage());
    $total_film_cards = 0;
}
