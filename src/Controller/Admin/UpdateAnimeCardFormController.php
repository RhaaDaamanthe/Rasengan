<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use Repository\CarteAnimeRepository;

class ListAnimeCardController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();
        $this->requireAdmin();

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $repo = new CarteAnimeRepository($pdo);
        $cartes = $repo->getAllCartesWithRarityInfo();

        require_once __DIR__ . '/../../../public/Html/admin/list-anime-cards.php';
    }
}

