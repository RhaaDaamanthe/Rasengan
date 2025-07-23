<?php

// 📁 Anime Card
use App\Controller\Admin\AnimeCard\ListAnimeCardController;
use App\Controller\Admin\AnimeCard\CreateAnimeCardFormController;
use App\Controller\Admin\AnimeCard\CreateAnimeCardSubmitController;
use App\Controller\Admin\AnimeCard\UpdateAnimeCardFormController;
use App\Controller\Admin\AnimeCard\UpdateAnimeCardSubmitController;
use App\Controller\Admin\AnimeCard\DeleteAnimeCardController;

// 📁 Film Card
use App\Controller\Admin\FilmCard\ListFilmCardController;
use App\Controller\Admin\FilmCard\CreateFilmCardFormController;
use App\Controller\Admin\FilmCard\CreateFilmCardSubmitController;
use App\Controller\Admin\FilmCard\UpdateFilmCardFormController;
use App\Controller\Admin\FilmCard\UpdateFilmCardSubmitController;
use App\Controller\Admin\FilmCard\DeleteFilmCardController;

// 📁 Badge
use App\Controller\Admin\Badge\ListBadgeController;
use App\Controller\Admin\Badge\CreateBadgeController;
use App\Controller\Admin\Badge\AddUserBadgeController;


// === Routes Admin Anime ===
$router->get('/admin/anime-cartes', ListAnimeCardController::class);
$router->get('/admin/anime-cartes/ajouter', CreateAnimeCardFormController::class);
$router->post('/admin/anime-cartes/ajouter', CreateAnimeCardSubmitController::class);
$router->get('/admin/anime-cartes/modifier/:id', UpdateAnimeCardFormController::class);
$router->post('/admin/anime-cartes/modifier/:id', UpdateAnimeCardSubmitController::class);
$router->post('/admin/anime-cartes/supprimer/:id', DeleteAnimeCardController::class);

// === Routes Admin Film ===
$router->get('/admin/film-cartes', ListFilmCardController::class);
$router->get('/admin/film-cartes/ajouter', CreateFilmCardFormController::class);
$router->post('/admin/film-cartes/ajouter', CreateFilmCardSubmitController::class);
$router->get('/admin/film-cartes/modifier/:id', UpdateFilmCardFormController::class);
$router->post('/admin/film-cartes/modifier/:id', UpdateFilmCardSubmitController::class);
$router->post('/admin/film-cartes/supprimer/:id', DeleteFilmCardController::class);

// === Routes Admin Badge ===
$router->get('/admin/badge', ListBadgeController::class);
$router->post('/admin/badge/creer', CreateBadgeController::class);
$router->post('/admin/badge/ajouter', AddUserBadgeController::class);




