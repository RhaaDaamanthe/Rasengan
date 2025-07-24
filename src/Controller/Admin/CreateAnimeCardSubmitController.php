<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Database\DBConnexion;
use Model\CarteAnime;
use Model\Rarete;
use Repository\CarteAnimeRepository;

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
        $quantite = (int) ($_POST['quantite'] ?? 1);
        $anime = $_POST['anime'] ?? '';

        if (!$nom || !$anime) {
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

        // Création de la carte avec rareté Event (id 6)
        $rarete = new Rarete(6, 1, 'Event');

        $carte = new CarteAnime(
            id: null,
            nom: $nom,
            anime: $anime,
            rarete: $rarete,
            imagePath: $imagePath,
            description: $description,
            infoSup: null,
            quantitePossedee: $quantite
        );

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $repo = new CarteAnimeRepository($pdo);
        $repo->insertCarteAnime($carte);

        $this->redirect('/admin/anime-cartes');
    }
}
