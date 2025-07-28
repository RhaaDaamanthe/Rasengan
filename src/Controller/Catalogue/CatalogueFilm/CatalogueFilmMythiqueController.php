<?php

namespace App\Controller\Catalogue\CatalogueFilm;

use App\Controller\AbstractController;
use App\Database\DBConnexion;

class CatalogueFilmMythiqueController extends AbstractController

{
    public function __invoke(): void
    {
        require_once __DIR__ . '/../../../public/Html/Catalogue/cartesFilmsMythiques.php';
    }
}

