<?php

namespace App\Controller\Authentification;

class InscriptionController {
    public function __invoke(): void {
        require_once __DIR__ . '/../../../public/Html/Connexion/inscription.php';
    }
}
