<?php

namespace Repository;

use Model\CarteAnime;
use Model\Rarete;
use PDO;
require_once __DIR__ . '/../Model/CarteAnime.php';

class CarteAnimeRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

        public function getAllCarteAnime(): array
        {
            $query = "SELECT ca.*, r.id_rarete AS rarete_id, r.libelle, r.quantite AS quantite_max
                  FROM cartes_animes ca
                  JOIN raretes r ON ca.id_rarete = r.id_rarete;";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();

            $cartes = [];
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $rarete = new Rarete(
                    (int)$row['rarete_id'],
                    (int)$row['quantite_max'],
                    $row['libelle']

                );

                $cartes[] = new CarteAnime(
                    (int)$row['id'],
                    $row['nom'],
                    $row['anime'],
                    $rarete,
                    $row['image_path'],
                    $row['description'] ?? null,
                    null,
                    0
                );
            }

            return $cartes;
        }

    public function getByIdAnime(int $id): ?CarteAnime {
        $stmt = $this->pdo->prepare("
            SELECT ca.*, r.id_rarete AS rarete_id, r.libelle, r.quantite AS quantite_max
            FROM cartes_animes ca
            JOIN raretes r ON ca.id_rarete = r.id_rarete
            WHERE ca.id = :id
        ");
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $rarete = new Rarete(
                (int)$row['rarete_id'],
                $row['libelle'],
                (int)$row['quantite_max']
            );
            return new CarteAnime(
                (int)$row['id'],
                $row['nom'],
                $row['anime'],
                $rarete,
                $row['image_path'],
                $row['description'] ?? null,
                null,
                0
            );
        }
        return null;
    }

    public function insertCarteAnime(CarteAnime $carte): bool
    {
        $query = 'INSERT INTO cartes_animes 
              (nom, anime, id_rarete, image_path, description) 
              VALUES 
              (:nom, :anime, :id_rarete, :image_path, :description);';

        $queryPrep = $this->pdo->prepare($query);

        $result = $queryPrep->execute([
            ':nom'         => $carte->getNom(),
            ':anime'       => $carte->getAnime(),
            ':id_rarete'   => $carte->getRarete()->getId(),
            ':image_path'  => $carte->getImagePath(),
            ':description' => $carte->getDescription(),
        ]);

        return $result;
    }

    public function updateCarteAnime(CarteAnime $carte): bool
    {
        $query = 'UPDATE cartes_animes 
              SET 
                  nom         = :nom,
                  anime       = :anime,
                  id_rarete   = :id_rarete,
                  image_path  = :image_path,
                  description = :description
              WHERE id = :id;';

        $queryPrep = $this->pdo->prepare($query);

        $result = $queryPrep->execute([
            ':id'          => $carte->getId(),
            ':nom'         => $carte->getNom(),
            ':anime'       => $carte->getAnime(),
            ':id_rarete'   => $carte->getRarete()->getId(),
            ':image_path'  => $carte->getImagePath(),
            ':description' => $carte->getDescription(),
        ]);

        return $result;
    }

    public function deleteCarteAnime(int $id): bool
    {
        $query = 'DELETE FROM cartes_animes WHERE id = :id;';
        $queryPrep = $this->pdo->prepare($query);

        return $queryPrep->execute([':id' => $id]);
    }

    public function getAllDistinctAnimes(): array {
        $query = "SELECT DISTINCT LOWER(TRIM(anime)) AS anime FROM cartes_animes ORDER BY anime ASC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return array_column($stmt->fetchAll(PDO::FETCH_ASSOC), 'anime');
    }
}