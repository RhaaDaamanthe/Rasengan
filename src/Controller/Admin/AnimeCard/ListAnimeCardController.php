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

    $pdo = DBConnexion::getOrCreateInstance()->getPdo();
    $repoAnime = new AnimeRepository($pdo);
    $repo = new CarteAnimeRepository($pdo);
    $repoRarete = new RareteRepository($pdo);

    // pagination
    $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
    $limit = 30;

    // filtres éventuels
    $idRarete = isset($_GET['rarete']) && $_GET['rarete'] !== '' ? (int)$_GET['rarete'] : null;
    $idAnime  = isset($_GET['anime']) && $_GET['anime'] !== '' ? (int)$_GET['anime'] : null;

    $cartes = $repo->getAllCartesWithRarityInfo($page, $limit, $idRarete, $idAnime);

    // total cartes pour pagination
    $nbTotal = $repo->countCartesAnime($idRarete, $idAnime);
    $nbPages = max(1, (int) ceil($nbTotal / $limit));


    // données annexes pour les filtres
    $raretes = $repoRarete->getAllRaretes();
    $animes = $repoAnime->getAllAnime();

    $type = 'anime';

    require_once __DIR__ . '/../../../../public/Html/Admin/ListCardAnime.php';
}
}
