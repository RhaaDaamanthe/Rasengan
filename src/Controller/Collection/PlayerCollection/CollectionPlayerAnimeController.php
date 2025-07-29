<?php

namespace App\Controller\Collection\PlayerCollection;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use App\Repository\CarteAnimeRepository;

class CollectionPlayerAnimeController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();

        $userId = $_SESSION['user_id'];

        $pdo = (new DBConnexion())->getPdo();
        $repo = new CarteAnimeRepository($pdo);
        $cartes = $repo->getCollectionAnimeByUserId($userId);

        require_once __DIR__ . '/../../../public/Html/Collection/collectionAnime.php';
    }
}
