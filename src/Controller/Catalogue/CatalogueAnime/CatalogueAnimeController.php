<?php

namespace App\Controller\Catalogue\CatalogueAnime;

use App\Controller\AbstractController;
use App\Repository\CarteAnimeRepository;
use App\Database\DBConnexion;

class CatalogueAnimeController extends AbstractController
{
    public function __invoke(): void
    {
        $this->requireLogin();

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $repo = new CarteAnimeRepository($pdo);

        $cartes = $repo->getAllCartesWithRarityInfo();

        require_once __DIR__ . '/../../../public/Html/Catalogue/cartes_animes.php';
    }
}
