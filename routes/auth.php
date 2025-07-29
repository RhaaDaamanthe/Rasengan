<?php

// 📁 Inscription
use App\Controller\Authentification\InscriptionController;

// 📁 Connexion
use App\Controller\Authentification\ConnexionController;

// 📁 Déconnexion
use App\Controller\Logout\LogoutController;


// === Routes Inscription ===
$router->get('/inscription', InscriptionController::class);
$router->post('/inscription', InscriptionController::class);

// === Routes Connexion ===
$router->get('/connexion', ConnexionController::class);
$router->post('/connexion', ConnexionController::class);

// === Routes Déconnexion ===
$router->post('/logout', LogoutController::class);
