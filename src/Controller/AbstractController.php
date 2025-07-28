<?php


// src/Controller/AbstractController.php
namespace App\Controller;

abstract class AbstractController
{
    //fonction qui permet d'obliger sur certaines pages à être connecté
    //si l'utilisateur n'est pas connecté, il est redirigé vers la page de connexion
    protected function requireLogin(string $redirect = '/connexion'): void
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: $redirect");
            exit;
        }
    }

    //fonction qui permet de vérifier si l'utilisateur est un administrateur
    //si l'utilisateur n'est pas un administrateur, il reçoit un message d'erreur lui interdisant l'accès
    protected function requireAdmin(): void
    {
        if (empty($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
            http_response_code(403);
            echo "Accès interdit.";
            exit;
        }
    }

    //fonction qui permet de rediriger l'utilisateur vers une autre page
    //elle prend en paramètre l'URL de redirection
    protected function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }

}
