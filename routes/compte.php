<?php

use App\Controller\Compte\AccountController;

//route pour accéder au profil de l'utilisateur
$router->get('/compte/:id', AccountController::class);
$router->post('/compte/update', UpdateAccountController::class);

//route pour accéder au profil d'un utilisateur en read-only
$router->get('/compte/viewer/:id', AccountViewerController::class);

//route pour voir tous les badges de l'utilisateur
$router->get('/profil/badge', ListUserBadgeController::class);
