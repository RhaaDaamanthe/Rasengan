<?php

namespace App\Controller\Collection;

class CollectionController {
    public function __invoke() {
        //on récupère la collection des joueurs
        require_once __DIR__ . '/../../../public/Html/Collection/collection.php';
    }
}
