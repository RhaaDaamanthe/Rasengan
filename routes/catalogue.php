<?php

// 📁 Catalogue page intermédiaire
use App\Controller\Catalogue\CatalogueController;

// 📁 Catalogue Anime
use App\Controller\Catalogue\CatalogueAnime\CatalogueAnimeController;
use App\Controller\Catalogue\CatalogueAnime\CatalogueAnimeCarteDetailController;
use App\Controller\Catalogue\CatalogueAnime\CatalogueAnimeMythiqueController;
use App\Controller\Catalogue\CatalogueAnime\CatalogueAnimeMythiqueDetailController;

// 📁 Catalogue Film
use App\Controller\Catalogue\CatalogueFilm\CatalogueFilmController;
use App\Controller\Catalogue\CatalogueFilm\CatalogueFilmCarteDetailController;
use App\Controller\Catalogue\CatalogueFilm\CatalogueFilmMythiqueController;
use App\Controller\Catalogue\CatalogueFilm\CatalogueFilmMythiqueDetailController;

//renvoie sur la page de sélection
$router->get('/catalogue', CatalogueController::class);

//affiche le catalogue des animes
$router->get('/catalogue/anime', CatalogueAnimeController::class);
$router->get('/catalogue/anime/carte/:id', CatalogueAnimeCarteDetailController::class);
$router->get('/catalogue/anime/mythique', CatalogueAnimeMythiqueController::class);
$router->get('/catalogue/anime/mythique/:id', CatalogueAnimeMythiqueDetailController::class);

//affiche le catalogue des films
$router->get('/catalogue/film', CatalogueFilmController::class);
$router->get('/catalogue/film/carte/:id', CatalogueFilmCarteDetailController::class);
$router->get('/catalogue/film/mythique', CatalogueFilmMythiqueController::class);
$router->get('/catalogue/film/mythique/:id', CatalogueFilmMythiqueDetailController::class);
