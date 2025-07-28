<?php

namespace App\Controller\Catalogue\CatalogueAnime;

use App\Controller\AbstractController;
use App\Database\DBConnexion;

class CatalogueAnimeMythiqueDetailController extends AbstractController
{
    public function __invoke(): void
    {
        require_once __DIR__ . '/../../../public/Html/Catalogue/cartesAnimesMythiquesDetail.php';
    }
}

