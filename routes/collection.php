<?php

// 📁 Collection générale
use App\Controller\Collection\CollectionController;

// 📁 Collection des joueurs
use App\Controller\Collection\PlayerCollection\CollectionPlayerController;
use App\Controller\Collection\PlayerCollection\CollectionPlayerAnimeController;
use App\Controller\Collection\PlayerCollection\CollectionPlayerFilmController;

// === Routes Collection ===
$router->get('/collection', CollectionController::class);


// === Routes Collection des joueurs ===
$router->get('/collection/joueur/:id', CollectionPlayerController::class);
$router->get('/collection/joueur/:id/anime', CollectionPlayerAnimeController::class);
$router->get('/collection/joueur/:id/film', CollectionPlayerFilmController::class);

