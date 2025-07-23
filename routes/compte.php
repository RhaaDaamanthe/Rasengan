<?php

use App\Controller\Compte\AccountController;

$router->get('/compte/:id', AccountController::class);
