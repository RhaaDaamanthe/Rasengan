<?php

namespace App\Controller\Admin\AnimeCard;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use Model\CarteAnime;
use Repository\CarteAnimeRepository;
use Repository\AnimeRepository;
use Repository\RareteRepository;

class CreateAnimeCardSubmitController extends AbstractController
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
        $animeId = (int) ($_POST['anime'] ?? 0);
        $rareteId = (int) ($_POST['id_rarete'] ?? 0);

        if (!$nom || !$animeId || !$rareteId) {
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
        $animeRepo = new AnimeRepository($pdo);
        $rareteRepo = new RareteRepository($pdo);
        $carteRepo = new CarteAnimeRepository($pdo);

        $anime = $animeRepo->getById($animeId);
        $rarete = $rareteRepo->getById($rareteId);

        if (!$anime || !$rarete) {
            http_response_code(404);
            echo "Anime ou rareté introuvable.";
            exit;
        }

        $carte = new CarteAnime(
            id: 0,
            nom: $nom,
            anime: $anime,
            rarete: $rarete,
            imagePath: $imagePath,
            description: $description,
            proprietaire: null,
            quantiteActuelle: 0
        );

        $carteRepo->insertCarteAnime($carte);

        $this->redirect('/Admin/admin-cartes');
    }
}
