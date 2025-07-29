<?php

namespace App\Controller\Player;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use App\Repository\UtilisateursRepository;

class PlayerViewPlayer extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();

        if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
            http_response_code(400);
            echo "ID utilisateur invalide.";
            exit;
        }

        $viewerId = (int) $_GET['id'];

        $pdo = (new DBConnexion())->getPdo();
        $repo = new UtilisateursRepository($pdo);
        $utilisateur = $repo->getUserById($viewerId);

        if (!$utilisateur) {
            http_response_code(404);
            echo "Utilisateur introuvable.";
            exit;
        }

        require_once __DIR__ . '/../../../public/Html/Player/playerViewer.php';
    }
}
