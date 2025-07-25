<?php

namespace App\Controller\Admin\AnimeCard;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use Model\Rarete;
use Repository\CarteAnimeRepository;
use Repository\AnimeRepository;

class UpdateAnimeCardSubmitController extends AbstractController
{
    public function __invoke(array $params): void
    {
        session_start();
        $this->requireLogin();
        $this->requireAdmin();

        if ($_SERVER['REQUEST_METHOD'] !== 'POST' || !isset($params['id'])) {
            http_response_code(405);
            echo "Requête invalide.";
            exit;
        }

        $id = (int)$params['id'];
        $nom = $_POST['nom'] ?? '';
        $description = $_POST['description'] ?? '';
        $animeId = (int)($_POST['anime'] ?? 0);
        $rareteId = (int)($_POST['id_rarete'] ?? 6);

        if (!$nom || !$animeId || !$rareteId) {
            http_response_code(400);
            echo "Champs manquants.";
            exit;
        }

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $carteRepo = new CarteAnimeRepository($pdo);
        $animeRepo = new AnimeRepository($pdo);

        $carteExistante = $carteRepo->getByIdAnime($id);
        $anime = $animeRepo->getById($animeId);

        if (!$carteExistante || !$anime) {
            http_response_code(404);
            echo "Carte ou anime introuvable.";
            exit;
        }

        $imagePath = $carteExistante->getImagePath();

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'Images/Cartes/Events/';
            if (!is_dir($uploadDir)) {
                mkdir($uploadDir, 0777, true);
            }
            $imageName = uniqid() . '_' . basename($_FILES['image']['name']);
            $imagePath = $uploadDir . $imageName;
            move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
        }

        // Modification directe de l'objet existant
        $carteExistante->setNom($nom);
        $carteExistante->setDescription($description);
        $carteExistante->setAnime($anime);
        $carteExistante->setRarete(new Rarete($rareteId, 0, ''));
        $carteExistante->setImagePath($imagePath);
        $carteExistante->setProprietaire(null);
        $carteExistante->setQuantiteActuelle(0);

        $carteRepo->updateCarteAnime($carteExistante);

        $this->redirect('/Admin/anime-cartes');
    }
}
