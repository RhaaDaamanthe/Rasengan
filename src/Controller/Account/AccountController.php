<?php

namespace App\Controller\Account;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use App\Repository\UtilisateursRepository;

class AccountController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();

        //Connexion à la base de donnée
        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $userId = $_SESSION['user_id'];

        //on récupère les informations de l'utilisateurs 
        $utilisateurRepo = new UtilisateursRepository($pdo);
        $user = $utilisateurRepo->getUserById($userId);

        //si jamais l'utilisateur n'est pas connecté et tente d'accéder à la route
        if (!$user) {
            http_response_code(404);
            echo "Utilisateur non trouvé.";
            exit;
        }
        //redirection vers la page du profil de l'utilisateur
        require_once __DIR__ . '/../../../public/Html/Compte/account.php';
    }
}
