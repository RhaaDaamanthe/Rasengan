<?php

namespace App\Controller\Admin\AnimeCard;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use App\Repository\CarteAnimeRepository;

class UpdateAnimeCardFormController extends AbstractController
{
    public function __invoke(array $params): void
    {
        session_start();
        $this->requireLogin();
        $this->requireAdmin();

        if (!isset($params['id']) || !is_numeric($params['id'])) {
            http_response_code(400);
            echo "ID invalide.";
            exit;
        }

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $repo = new CarteAnimeRepository($pdo);
        $carte = $repo->getByIdAnime((int)$params['id']);

        if (!$carte) {
            http_response_code(404);
            echo "Carte non trouvée.";
            exit;
        }

        require_once __DIR__ . '/../../../public/Html/Admin/FormulaireInsertUpdateAnime.php';
    }
}
