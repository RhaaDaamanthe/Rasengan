<?php

namespace App\Controller\Admin\FilmCard;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use App\Model\CarteFilm;
use App\Repository\CarteFilmRepository;
use App\Repository\FilmsRepository;
use App\Repository\RareteRepository;

class CreateFilmCardSubmitController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();
        $this->requireAdmin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            http_response_code(405);
            echo "Méthode non autorisée";
            exit;
        }

        $nom = $_POST['nom'] ?? '';
        $description = $_POST['description'] ?? '';
        $filmId = (int) ($_POST['film'] ?? 0);
        $rareteId = (int) ($_POST['id_rarete'] ?? 0);

        if (!$nom || !$filmId || !$rareteId) {
            http_response_code(400);
            echo "Champs obligatoires manquants.";
            exit;
        }

        // Upload de l'image
        $imagePath = 'Images/Cartes/Events/default.jpg';
        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'Images/Cartes/Events/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $imageName = uniqid() . '_' . basename($_FILES['image']['name']);
            $imagePath = $uploadDir . $imageName;
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        }

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $filmRepo = new FilmsRepository($pdo);
        $rareteRepo = new RareteRepository($pdo);
        $carteRepo = new CarteFilmRepository($pdo);

        $film = $filmRepo->getById($filmId);
        $rarete = $rareteRepo->getById($rareteId);

        if (!$film || !$rarete) {
            http_response_code(404);
            echo "Film ou rareté introuvable.";
            exit;
        }

        $carte = new CarteFilm(
            id: 0,
            nom: $nom,
            film: $film,
            rarete: $rarete,
            imagePath: $imagePath,
            description: $description,
            proprietaire: null,
            quantiteActuelle: 0
        );

        $carteRepo->insertCarteFilm($carte);

        $this->redirect('/Admin/film-cartes');
    }
}

