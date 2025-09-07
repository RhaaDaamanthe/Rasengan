<?php

namespace App\Controller\Catalogue\CatalogueFilm;

use App\Controller\AbstractController;
use App\Repository\CarteFilmRepository;
use App\Database\DBConnexion;

class CatalogueFilmController extends AbstractController
{
    public function __invoke(): void
    {
        // $this->requireLogin();

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $repo = new CarteFilmRepository($pdo);

        $cartes = $repo->getAllCartesFilmWithRarityInfo();

        require_once __DIR__ . '/../../../../public/Html/Catalogue/catalogueFilm.php';
    }
}
