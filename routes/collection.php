<?php

use App\Controller\Collection\CollectionController;
use App\Controller\Collection\PlayerCollection\CollectionPlayerController;
use App\Controller\Collection\PlayerCollection\CollectionPlayerAnimeController;
use App\Controller\Collection\PlayerCollection\CollectionPlayerFilmController;

//collection générale, voir l'ensemble des joueurs
$router->get('/collection', CollectionController::class);


//collection concernant les joueurs individuellement
$router->get('/collection/joueur/:id', CollectionPlayerController::class);
$router->get('/collection/joueur/:id/anime', CollectionPlayerAnimeController::class);
$router->get('/collection/joueur/:id/film', CollectionPlayerFilmController::class);

