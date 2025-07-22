<?php

namespace App\Controller\Catalogue;

use App\Controller\AbstractController;
use Repository\CatalogueAnimeRepository;
use src\Initialisation\DBConnexion;

class CatalogueAnimeController extends AbstractController
{
    public function __invoke(): void
    {
        $this->requireLogin();

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $repo = new CarteAnimeRepository($pdo);

        $cartes = $repo->getAllCartesAvecInfos();

        require_once __DIR__ . '/../../../public/Html/Catalogue/cartes_animes.php';
    }
}
