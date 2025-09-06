<?php

namespace App\Controller\Catalogue;

use App\Controller\AbstractController;
use App\Repository\AnimeRepository;
use App\Repository\FilmsRepository;
use App\Database\DBConnexion;

class CatalogueController extends AbstractController
{
    public function __invoke(): void
    {
        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        
        $animeRepository = new AnimeRepository($pdo);
        $filmsRepository = new FilmsRepository($pdo);

        $animes = $animeRepository->getAnimesWithCardCount();
        $films = $filmsRepository->getFilmsWithCardCount();

        require_once __DIR__ . '/../../../public/Html/Catalogue/catalogue.php';
    }
}