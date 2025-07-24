<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use App\Repository\AnimeRepository;

class CreateAnimeCardFormController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();
        $this->requireAdmin();

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $animeRepo = new AnimeRepository($pdo);
        $animes = $animeRepo->findAll();

        require_once __DIR__ . '/../../../public/Html/admin/anime-card-form.php';
    }
}
