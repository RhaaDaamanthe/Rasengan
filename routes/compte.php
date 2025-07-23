<?php

use App\Controller\Compte\AccountController;

//route pour accéder au profil de l'utilisateur
$router->get('/compte/:id', AccountController::class);
