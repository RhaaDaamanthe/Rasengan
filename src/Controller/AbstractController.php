<?php


// src/Controller/AbstractController.php
namespace App\Controller;

abstract class AbstractController
{
    protected function requireLogin(string $redirect = '/connexion'): void
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: $redirect");
            exit;
        }
    }

    protected function requireAdmin(): void
    {
        if (empty($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
            http_response_code(403);
            echo "Accès interdit.";
            exit;
        }
    }

    protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }

}
