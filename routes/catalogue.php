<?php

use App\Controller\Catalogue\CatalogueController;
use App\Controller\Catalogue\CatalogueAnimeController;
use App\Controller\Catalogue\CatalogueAnimeMythiqueController;
use App\Controller\Catalogue\CatalogueAnimeMythiqueDetailController;
use App\Controller\Catalogue\CatalogueFilmController;
use App\Controller\Catalogue\CatalogueFilmMythiqueController;
use App\Controller\Catalogue\CatalogueFilmMythiqueDetailController;

//renvoie sur la page de sélection
$router->get('/catalogue', CatalogueController::class);

//affiche le catalogue des animes
$router->get('/catalogue/anime', CatalogueAnimeController::class);
$router->get('/catalogue/anime/mythique', CatalogueAnimeMythiqueController::class);
$router->get('/catalogue/anime/mythique/:id', CatalogueAnimeMythiqueDetailController::class);

//affiche le catalogue des films
$router->get('/catalogue/film', CatalogueFilmController::class);
$router->get('/catalogue/film/mythique', CatalogueFilmMythiqueController::class);
$router->get('/catalogue/film/mythique/:id', CatalogueFilmMythiqueDetailController::class);
