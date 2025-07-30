<?php

namespace App\Controller\Admin\AnimeCard;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use App\Repository\CarteAnimeRepository;
use App\Repository\RareteRepository;
use App\Repository\AnimeRepository;

class ListAnimeCardController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();
        $this->requireAdmin();

        $pdo        = DBConnexion::getOrCreateInstance()->getPdo();
        $repo       = new CarteAnimeRepository($pdo);
        $repoAnime  = new RareteRepository($pdo);
        $repoRarete = new AnimeRepository($pdo);

        // Paramètres GET pour la pagination et les filtres
        $page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
        $rarete = isset($_GET['rarete']) ? (int)$_GET['rarete'] : null;
        $anime = isset($_GET['anime']) ? (int)$_GET['anime'] : null;
        $limit = 30;

        // Données
        $cartes = $repo->getAllCartesWithRarityInfo($page, $limit, $rarete, $anime);
        $total = $repo->countCartesAnime($rarete, $anime);
        $nbPages = ceil($total / $limit);

        // Pour les filtres
        $raretes = $repoAnime->getAllRaretes();
        $animes = $repoRarete->getAllAnime();

        $type = 'anime';
        require_once __DIR__ . '/../../../public/Html/Admin/ListCardAdmin.php';
    }
}
