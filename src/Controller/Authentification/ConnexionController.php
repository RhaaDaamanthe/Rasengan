<?php

namespace App\Controller\Connexion;

class ConnexionController {
    public function __invoke() {
        //on récupère la collection des joueurs
        require_once __DIR__ . '/../../../public/Html/Connexion/connexion.php';
    }
}
