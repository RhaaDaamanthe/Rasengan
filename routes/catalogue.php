<?php

use App\Controller\Catalogue\CatalogueController;

$router->get('/catalogue', CatalogueController::class);
$router->get('/catalogue/animes', CartesAnimeController::class);

