<?php

namespace App\Controller\Logout;

use App\Controller\AbstractController;

class LogoutController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();

        //suppression des variables de la session
        $_SESSION = [];

        //destruction de la session
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        //redirection vers la page de connexion
        header("Location: /connexion");
        exit;
    }
}
