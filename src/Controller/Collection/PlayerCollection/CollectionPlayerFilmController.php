<?php

namespace App\Controller\Collection\PlayerCollection;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use App\Repository\UtilisateurCarteFilmRepository;

class CollectionPlayerFilmController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();

        $userId = (int)($_SESSION['user_id'] ?? 0);

        $pdo  = DBConnexion::getOrCreateInstance()->getPdo();
        $repo = new UtilisateurCarteFilmRepository($pdo);
        $cartes = $repo->getCollectionFilmByUserId($userId);

        require_once __DIR__ . '/../../../public/Html/Collection/collectionFilm.php';
    }
}
