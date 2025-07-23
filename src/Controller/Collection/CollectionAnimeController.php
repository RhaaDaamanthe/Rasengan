<?php

namespace App\Controller\Collection;

use App\Controller\AbstractController;
use App\Repository\UtilisateurCarteAnimeRepository;
use App\Database\DBConnexion;

class CollectionAnimeController extends AbstractController {
    public function __invoke(): void {
        session_start();
        $this->requireLogin();

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $userId = $_SESSION['user_id'];

        $animeRepo = new UtilisateurCarteAnimeRepository($pdo);

        $animeCollection = $animeRepo->getCollectionAnimeByUserId($userId);

        require_once __DIR__ . '/../../../public/Html/Collection/collectionAnime.php';
    }
}
