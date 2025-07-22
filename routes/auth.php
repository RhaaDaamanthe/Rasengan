<?php

use App\Controller\Authentification\InscriptionController;
use App\Controller\Authentification\ConnexionController;
use App\Controller\Authentification\LogoutController;

$router->get('/inscription', InscriptionController::class);
$router->post('/inscription', InscriptionController::class);
$router->get('/connexion', ConnexionController::class);
$router->post('/connexion', ConnexionController::class);
$router->post('/logout', LogoutController::class);
