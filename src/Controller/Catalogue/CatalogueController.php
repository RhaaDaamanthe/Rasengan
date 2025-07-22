<?php

namespace App\Controller\Catalogue;

use App\Controller\AbstractController;
use Repository\CatalogueRepository;
use Service\DBConnexion;

class CatalogueController extends AbstractController
{
    public function __invoke(): void
    {
        $this->requireLogin();

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $repository = new CatalogueRepository($pdo);

        $animes = $repository->getAnimesWithCardCount();
        $films = $repository->getFilmsWithCardCount();

        $total_anime_cards = array_sum(array_column($animes, 'card_count'));
        $total_film_cards = array_sum(array_column($films, 'card_count'));

        require_once __DIR__ . '/../../../public/Html/Catalogue/catalogue.php';
    }
}
