<?php

namespace App\Controller\Admin\AnimeCard;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use Repository\AnimeRepository;
use Repository\RareteRepository;

class CreateAnimeCardFormController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();
        $this->requireAdmin();

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();

        $animeRepo = new AnimeRepository($pdo);
        $rareteRepo = new RareteRepository($pdo);

        $animes = $animeRepo->getAllAnime();
        $raretes = $rareteRepo->getAllRaretes();

        require_once __DIR__ . '/../../../public/Html/Admin/Forms/FormulaireInsertUpdateAnime.php';
    }
}
        