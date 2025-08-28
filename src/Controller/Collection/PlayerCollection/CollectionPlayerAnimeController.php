<?php

namespace App\Controller\Collection\PlayerCollection;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use App\Repository\UtilisateurCarteAnimeRepository;

class CollectionPlayerAnimeController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();

        $pdo  = DBConnexion::getOrCreateInstance()->getPdo();
        $repo = new UtilisateurCarteAnimeRepository($pdo);

        $userId = (int) $_SESSION['user_id'];
        $cartes = $repo->getCollectionAnimeByUserId($userId);

        // variables rendues dispo pour la vue
        // $cartes contient la collection de l'utilisateur
        require_once __DIR__ . '/../../../public/Html/Collection/collectionAnime.php';
    }
}
