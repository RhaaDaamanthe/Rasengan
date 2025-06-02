<?php

namespace Repository;

use Model\CarteFilm;
use Model\Rarete;
use PDO;
require_once __DIR__ . '/../Model/CarteFilm.php';
class CarteFilmRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAllCarteFilm(): array
    {
        $query = "SELECT cf.*, r.id_rarete AS rarete_id, r.libelle, r.quantite AS quantite_max
              FROM cartes_films cf
              JOIN raretes r ON cf.id_rarete = r.id_rarete;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $cartes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rarete = new Rarete(
                (int)$row['rarete_id'],
                (int)$row['quantite_max'],
                $row['libelle']

            );

            $cartes[] = new CarteFilm(
                (int)$row['id'],
                $row['nom'],
                $row['film'],
                $rarete,
                $row['image_path'],
                $row['description'] ?? null,
                null,
                0
            );
        }

        return $cartes;
    }

    public function getByIdFilm(int $id): ?CarteFilm {
        $query = 'SELECT cf.*, r.id_rarete AS rarete_id, r.libelle, r.quantite AS quantite_max
                  FROM cartes_films cf
                  JOIN raretes r ON cf.id_rarete = r.id_rarete
                  WHERE cf.id = :id';

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $rarete = new Rarete(
                (int)$row['rarete_id'],
                $row['libelle'],
                (int)$row['quantite_max']
            );

            return new CarteFilm(
                (int)$row['id'],
                $row['nom'],
                $row['film'],
                $rarete,
                $row['image_path'],
                $row['description'] ?? null,
                null,
                0
            );
        }

        return null;
    }

    public function insertCarteFilm(CarteFilm $carte): bool {
        $query = 'INSERT INTO cartes_films 
                  (nom, film, id_rarete, image_path, description) 
                  VALUES 
                  (:nom, :film, :id_rarete, :image_path, :description);';

        $queryPrep = $this->pdo->prepare($query);

        return $queryPrep->execute([
            ':nom'         => $carte->getNom(),
            ':film'        => $carte->getFilm(),
            ':id_rarete'   => $carte->getRarete()->getId(),
            ':image_path'  => $carte->getImagePath(),
            ':description' => $carte->getDescription(),
        ]);
    }

    public function updateCarteFilm(CarteFilm $carte): bool {
        $query = 'UPDATE cartes_films 
                  SET 
                      nom         = :nom,
                      film        = :film,
                      id_rarete   = :id_rarete,
                      image_path  = :image_path,
                      description = :description
                  WHERE id = :id;';

        $queryPrep = $this->pdo->prepare($query);

        return $queryPrep->execute([
            ':id'          => $carte->getId(),
            ':nom'         => $carte->getNom(),
            ':film'        => $carte->getFilm(),
            ':id_rarete'   => $carte->getRarete()->getId(),
            ':image_path'  => $carte->getImagePath(),
            ':description' => $carte->getDescription(),
        ]);
    }

    public function deleteCarteFilm(int $id): bool {
        $query = 'DELETE FROM cartes_films WHERE id = :id;';
        $queryPrep = $this->pdo->prepare($query);

        return $queryPrep->execute([':id' => $id]);
    }

    public function getAllDistinctFilms(): array {
        $query = "SELECT DISTINCT LOWER(TRIM(film)) AS film FROM cartes_films ORDER BY film ASC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return array_column($stmt->fetchAll(PDO::FETCH_ASSOC), 'film');
    }

}