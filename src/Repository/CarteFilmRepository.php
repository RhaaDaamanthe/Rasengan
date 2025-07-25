<?php

namespace Repository;

use Model\CarteFilm;
use Model\Film;
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
        $query = "SELECT cf.*, f.id AS film_id, f.nom AS film_nom,
                         r.id_rarete AS rarete_id, r.libelle, r.quantite AS quantite_max
                  FROM cartes_films cf
                  JOIN films f ON cf.id_film = f.id
                  JOIN raretes r ON cf.id_rarete = r.id_rarete
                  ORDER BY cf.id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $cartes = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rarete = new Rarete(
                (int)$row['rarete_id'],
                (int)$row['quantite_max'],
                $row['libelle']
            );

            $film = new Film(
                (int)$row['film_id'],
                $row['film_nom']
            );

            $cartes[] = new CarteFilm(
                (int)$row['id'],
                $row['nom'],
                $film,
                $rarete,
                $row['image_path'],
                $row['description'] ?? null,
                null,
                0
            );
        }

        return $cartes;
    }

    public function getById(int $id): ?CarteFilm
    {
        $query = "SELECT cf.*, f.id AS film_id, f.nom AS film_nom,
                         r.id_rarete AS rarete_id, r.libelle, r.quantite AS quantite_max
                  FROM cartes_films cf
                  JOIN films f ON cf.id_film = f.id
                  JOIN raretes r ON cf.id_rarete = r.id_rarete
                  WHERE cf.id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $rarete = new Rarete(
                (int)$row['rarete_id'],
                (int)$row['quantite_max'],
                $row['libelle']
            );

            $film = new Film(
                (int)$row['film_id'],
                $row['film_nom']
            );

            return new CarteFilm(
                (int)$row['id'],
                $row['nom'],
                $film,
                $rarete,
                $row['image_path'],
                $row['description'] ?? null,
                null,
                0
            );
        }

        return null;
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

    public function insertCarteFilm(CarteFilm $carte): bool
    {
        $query = 'INSERT INTO cartes_films 
                  (nom, id_film, id_rarete, image_path, description) 
                  VALUES 
                  (:nom, :id_film, :id_rarete, :image_path, :description)';

        $stmt = $this->pdo->prepare($query);

        return $stmt->execute([
            ':nom'         => $carte->getNom(),
            ':id_film'     => $carte->getFilm()->getId(),
            ':id_rarete'   => $carte->getRarete()->getId(),
            ':image_path'  => $carte->getImagePath(),
            ':description' => $carte->getDescription(),
        ]);
    }

    public function updateCarteFilm(CarteFilm $carte): bool
    {
        $query = 'UPDATE cartes_films 
                  SET nom = :nom,
                      id_film = :id_film,
                      id_rarete = :id_rarete,
                      image_path = :image_path,
                      description = :description
                  WHERE id = :id';

        $stmt = $this->pdo->prepare($query);

        return $stmt->execute([
            ':id'          => $carte->getId(),
            ':nom'         => $carte->getNom(),
            ':id_film'     => $carte->getFilm()->getId(),
            ':id_rarete'   => $carte->getRarete()->getId(),
            ':image_path'  => $carte->getImagePath(),
            ':description' => $carte->getDescription(),
        ]);
    }

    public function deleteCarteFilm(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM cartes_films WHERE id = :id');
        return $stmt->execute([':id' => $id]);
    }

    public function getAllDistinctFilms(): array {
        $query = "SELECT DISTINCT LOWER(TRIM(film)) AS film FROM cartes_films ORDER BY film ASC";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return array_column($stmt->fetchAll(PDO::FETCH_ASSOC), 'film');
    }

    public function getAllCartesFilmWithRarityInfo(): array
    {
        $sql = "SELECT cf.id, cf.nom, cf.id_rarete, cf.image_path, cf.description,
                       f.nom AS film, r.libelle AS rarete_libelle, r.quantite AS quantite_max
                FROM cartes_films cf
                JOIN raretes r ON cf.id_rarete = r.id_rarete
                LEFT JOIN films f ON cf.id_film = f.id
                ORDER BY cf.id_rarete DESC, cf.id ASC";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    
        $cartes = [];
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rarete = new Rarete(
                (int)$row['id_rarete'],
                (int)$row['quantite_max'],
                $row['rarete_libelle']
            );
    
            $carte = new CarteFilm(
                (int)$row['id'],
                $row['nom'],
                $row['film'],
                $rarete,
                $row['image_path'],
                $row['description'] ?? null,
                null,
                0
            );
    
            if (in_array($rarete->getId(), [6, 5, 4])) {
                $stmt2 = $this->pdo->prepare("SELECT u.pseudo FROM utilisateurs u JOIN utilisateurs_cartes_films uc ON u.id = uc.user_id WHERE uc.carte_id = ? LIMIT 1");
                $stmt2->execute([$row['id']]);
                $carte->setInfoSup($stmt2->fetchColumn() ?: 'Aucun');
    
            } elseif (in_array($rarete->getId(), [3, 2, 1])) {
                $stmt3 = $this->pdo->prepare("SELECT SUM(quantite) as total FROM utilisateurs_cartes_films WHERE carte_id = ?");
                $stmt3->execute([$row['id']]);
                $total = $stmt3->fetchColumn() ?: 0;
                $max = ($rarete->getId() === 3) ? 2 : 3;
                $carte->setInfoSup("Prises : $total/$max");
    
                $stmt4 = $this->pdo->prepare("SELECT u.pseudo FROM utilisateurs u JOIN utilisateurs_cartes_films uc ON u.id = uc.user_id WHERE uc.carte_id = ?");
                $stmt4->execute([$row['id']]);
                $carte->setOwners($stmt4->fetchAll(PDO::FETCH_COLUMN));
            }
    
            $cartes[] = $carte;
        }
    
        return $cartes;
    }


}
