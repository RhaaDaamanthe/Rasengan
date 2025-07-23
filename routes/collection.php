<?php

use App\Controller\Collection\CollectionController;
use App\Controller\Joueur\PlayerController;
use App\Controller\Joueur\PlayerAnimeController;
use App\Controller\Joueur\PlayerFilmController;

//collection générale, voir l'ensemble des joueurs
$router->get('/collection', CollectionController::class);


//collection concernant les joueurs individuellement
$router->get('/collection/joueur/:id', PlayerController::class);
$router->get('/collection/joueur/:id/anime', PlayerAnimeController::class);
$router->get('/collection/joueur/:id/film', PlayerFilmController::class);

