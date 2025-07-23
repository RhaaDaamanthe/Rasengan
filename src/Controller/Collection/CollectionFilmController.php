<?php

namespace App\Controller\Collection;

use App\Controller\AbstractController;
use App\Repository\UtilisateurCarteFilmRepository;
use App\Database\DBConnexion;

class CollectionFilmController extends AbstractController {
    public function __invoke(): void {
        session_start();
        $this->requireLogin();

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $userId = $_SESSION['user_id'];

        $filmRepo = new UtilisateurCarteFilmRepository($pdo);

        $filmCollection = $filmRepo->getCollectionFilmByUserId($userId);

        require_once __DIR__ . '/../../../public/Html/Collection/collectionFilm.php';
    }
}
