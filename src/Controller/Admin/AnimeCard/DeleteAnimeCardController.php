<?php

namespace App\Controller\Admin\AnimeCard;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use Repository\CarteAnimeRepository;

class DeleteAnimeCardController extends AbstractController
{
    public function __invoke(array $params): void
    {
        session_start();
        $this->requireLogin();
        $this->requireAdmin();

        // Vérifie que la méthode est bien POST
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo "Méthode non autorisée.";
            exit;
        }

        // Récupération de l'identifiant depuis la route
        if (!isset($params['id']) || !is_numeric($params['id'])) {
            http_response_code(400);
            echo "ID invalide.";
            exit;
        }

        $idCarte = (int)$params['id'];
        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $repo = new CarteAnimeRepository($pdo);

        $result = $repo->deleteCarteAnime($idCarte);

        if (!$result) {
            http_response_code(500);
            echo "Erreur lors de la suppression de la carte.";
            exit;
        }

        $this->redirect('/Admin/anime-cartes');
    }
}

