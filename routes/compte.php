<?php

// 📁 Profil du joueur
use App\Controller\Account\AccountController;
use App\Controller\Account\UpdateAccountController;

// 📁 Profil d'un autre joueur
use App\Controller\Account\AccountViewerController;

// 📁 Badge du joueur
use App\Controller\Account\ListUserBadgeController;

//route pour accéder au profil de l'utilisateur
$router->get('/compte/:id', AccountController::class);
$router->post('/compte/update', UpdateAccountController::class);

//route pour accéder au profil d'un utilisateur en read-only
$router->get('/compte/viewer/:id', AccountViewerController::class);

//route pour voir tous les badges de l'utilisateur
$router->get('/compte/badge', ListUserBadgeController::class);
