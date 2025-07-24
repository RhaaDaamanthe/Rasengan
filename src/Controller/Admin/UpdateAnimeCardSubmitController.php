<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use Model\CarteAnime;
use Model\Rarete;
use Repository\CarteAnimeRepository;

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
        $anime = $_POST['anime'] ?? '';
        $rareteId = (int)($_POST['id_rarete'] ?? 6);

        if (!$nom || !$anime || !$rareteId) {
            http_response_code(400);
            echo "Champs manquants.";
            exit;
        }

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $repo = new CarteAnimeRepository($pdo);
        $carteExistante = $repo->getByIdAnime($id);

        if (!$carteExistante) {
            http_response_code(404);
            echo "Carte introuvable.";
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

        $carte = new CarteAnime(
            id: $id,
            nom: $nom,
            anime: $anime,
            rarete: new Rarete($rareteId, 0, ''),
            imagePath: $imagePath,
            description: $description,
            infoSup: null,
            quantitePossedee: 0
        );

        $repo->updateCarteAnime($carte);

        $this->redirect('/admin/anime-cartes');
    }
}
