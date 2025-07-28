<?php

namespace App\Controller\Admin\FilmCard;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use App\Repository\FilmsRepository;
use App\Repository\RareteRepository;

class CreateFilmCardFormController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();
        $this->requireAdmin();

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();

        $filmRepo = new FilmsRepository($pdo);
        $rareteRepo = new RareteRepository($pdo);

        $films = $filmRepo->getAllFilm();
        $raretes = $rareteRepo->getAllRaretes();

        require_once __DIR__ . '/../../../public/Html/Admin/Forms/FormulaireInsertUpdateFilm.php';
    }
}
