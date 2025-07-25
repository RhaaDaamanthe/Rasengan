<?php

namespace App\Controller\Admin\FilmCard;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use App\Repository\CarteFilmRepository;

class ListFilmCardController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();
        $this->requireAdmin();

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $repo = new CarteFilmRepository($pdo);
        $cartes = $repo->getAllCartesFilmWithRarityInfo();

        require_once __DIR__ . '/../../../public/Html/Admin/ListCardAdmin.php';
    }
}
