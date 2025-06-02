<?php
session_start();

/**
 * Redirige si l'utilisateur n'est pas connecté.
 * Optionnel : ignorer certaines pages comme la page de connexion elle-même.
 */
function requireLogin($redirectPage = 'compte.php') {
    $currentPage = basename($_SERVER['PHP_SELF']);
    if (!isset($_SESSION['user_id']) && $currentPage !== $redirectPage) {
        header("Location: $redirectPage");
        exit;
    }
}

/**
 * Vérifie si l'utilisateur est administrateur
 */
function isAdmin(): bool {
    return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
}
