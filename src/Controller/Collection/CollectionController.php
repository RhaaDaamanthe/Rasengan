<?php

namespace App\Controller\Collection;

use App\Controller\AbstractController;

class CollectionController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();

        // Simule un chargement de données (idéalement via Repository ou Service)
        $joueurs = require __DIR__ . '/../../../src/data/joueurs.php';

        //la vue
        require_once __DIR__ . '/../../../public/Html/Collection/collection.php';
    }
}
