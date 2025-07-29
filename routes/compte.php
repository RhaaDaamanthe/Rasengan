<?php

// 📁 Profil du joueur
use App\Controller\Account\AccountController;
use App\Controller\Account\UpdateAccountController;

// 📁 Profil d'un autre joueur
use App\Controller\Account\AccountViewerController;

// 📁 Badge du joueur
use App\Controller\Account\ListUserBadgeController;

// === Routes Profil du joueur ===
$router->get('/compte/:id', AccountController::class);
$router->post('/compte/update', UpdateAccountController::class);

// === Routes Profil d'un autre joueur ===
$router->get('/compte/viewer/:id', AccountViewerController::class);

// === Routes Badge du joueur ===
$router->get('/compte/badge', ListUserBadgeController::class);
