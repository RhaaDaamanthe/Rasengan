<?php

namespace App\Repository;


use App\Model\CarteAnime;
use App\Model\Anime;
use App\Model\Rarete;
use PDO;



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

    public function getById(int $id): ?CarteAnime
    {
        $sql = "SELECT ca.*, 
                r.id_rarete AS rarete_id, r.libelle AS rarete_libelle, r.quantite AS quantite_max,
                a.id AS anime_id, a.nom AS anime_nom
                FROM cartes_animes ca
                JOIN raretes r ON ca.id_rarete = r.id_rarete
                LEFT JOIN animes a ON ca.id_anime = a.id
                WHERE ca.id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $rarete = new Rarete(
                (int)$row['rarete_id'],
                (int)$row['quantite_max'],
                $row['rarete_libelle']
            );

            $anime = new Anime(
                (int)$row['anime_id'],
                $row['anime_nom']
            );

            return new CarteAnime(
                id: (int)$row['id'],
                nom: $row['nom'],
                anime: $anime,
                rarete: $rarete,
                imagePath: $row['image_path'],
                description: $row['description'] ?? null,
                proprietaire: null,
                quantiteActuelle: 0
            );
        }

        return null;
    }


    public function getAllCartesWithRarityInfo(): array
    {
        $sql = "SELECT ca.id, ca.nom, ca.id_rarete, ca.image_path, ca.description,
                a.id AS anime_id, a.nom AS anime_nom,
                r.libelle AS rarete_libelle, r.quantite AS quantite_max
                FROM cartes_animes ca
                JOIN raretes r ON ca.id_rarete = r.id_rarete
                LEFT JOIN animes a ON ca.id_anime = a.id
                ORDER BY ca.id_rarete DESC, ca.id ASC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        $cartes = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $rarete = new Rarete(
                (int)$row['id_rarete'],
                (int)$row['quantite_max'],
                $row['rarete_libelle']
            );

            $anime = new Anime(
                (int)($row['anime_id'] ?? 0),
                $row['anime_nom'] ?? 'Inconnu'
            );

            $carte = new CarteAnime(
                (int)$row['id'],
                $row['nom'],
                $anime,
                $rarete,
                $row['image_path'],
                $row['description'] ?? null,
                null,
                0
            );

            // Ajout des infos supplémentaires
            if (in_array($rarete->getId(), [6, 5, 4])) {
                $stmt2 = $this->pdo->prepare("
                    SELECT u.pseudo 
                    FROM utilisateurs u 
                    JOIN utilisateurs_cartes_animes uc ON u.id = uc.user_id 
                    WHERE uc.carte_id = ? 
                    LIMIT 1
                ");
                $stmt2->execute([$row['id']]);
                $carte->setInfoSup($stmt2->fetchColumn() ?: 'Aucun');

            } elseif (in_array($rarete->getId(), [3, 2, 1])) {
                $stmt3 = $this->pdo->prepare("
                    SELECT SUM(quantite) as total 
                    FROM utilisateurs_cartes_animes 
                    WHERE carte_id = ?
                ");
                $stmt3->execute([$row['id']]);
                $total = $stmt3->fetchColumn() ?: 0;
                $max = ($rarete->getId() === 3) ? 2 : 3;
                $carte->setInfoSup("Prises : $total/$max");

                $stmt4 = $this->pdo->prepare("
                    SELECT u.pseudo 
                    FROM utilisateurs u 
                    JOIN utilisateurs_cartes_animes uc ON u.id = uc.user_id 
                    WHERE uc.carte_id = ?
                ");
                $stmt4->execute([$row['id']]);
                $carte->setOwners($stmt4->fetchAll(PDO::FETCH_COLUMN));
            }

            $cartes[] = $carte;
        }

        return $cartes;
    }

    public function getCollectionAnimeByUserId(int $userId): array
    {
        $sql = "SELECT ca.id, ca.nom, ca.id_rarete, ca.image_path, ca.description,
                       a.nom AS anime, r.libelle AS rarete_libelle, r.quantite AS quantite_max
                FROM utilisateurs_cartes_animes uca
                JOIN cartes_animes ca ON ca.id = uca.carte_id
                LEFT JOIN animes a ON ca.id_anime = a.id
                JOIN raretes r ON ca.id_rarete = r.id_rarete
                WHERE uca.user_id = ?
                ORDER BY ca.id_rarete DESC, ca.id ASC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);
        $cartes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($cartes as &$carte) {
            $idRarete = (int) $carte['id_rarete'];
            $carteId = (int) $carte['id'];

            if (in_array($idRarete, [6, 5, 4])) {
                $carte['info_sup'] = $this->getSingleOwner($carteId) ?? 'Aucun';
                $carte['owners'] = null;
            } else {
                $total = $this->getTotalCopies($carteId);
                $carte['info_sup'] = "Prises : $total";
                $carte['info_sup'] .= match ($idRarete) {
                    3 => '/2',
                    2, 1 => '/3',
                    default => '',
                };
                $carte['owners'] = $this->getOwnersByCardId($carteId);
            }
        }

        return $cartes;
    }

    private function getSingleOwner(int $carteId): ?string
    {
        $stmt = $this->pdo->prepare("SELECT u.pseudo
                                     FROM utilisateurs u
                                     JOIN utilisateurs_cartes_animes uc ON u.id = uc.user_id
                                     WHERE uc.carte_id = ?
                                     LIMIT 1");
        $stmt->execute([$carteId]);
        return $stmt->fetchColumn() ?: null;
    }

    private function getTotalCopies(int $carteId): int
    {
        $stmt = $this->pdo->prepare("SELECT SUM(quantite)
                                     FROM utilisateurs_cartes_animes
                                     WHERE carte_id = ?");
        $stmt->execute([$carteId]);
        return (int) ($stmt->fetchColumn() ?? 0);
    }

    private function getOwnersByCardId(int $carteId): array
    {
        $stmt = $this->pdo->prepare("SELECT u.pseudo
                                     FROM utilisateurs u
                                     JOIN utilisateurs_cartes_animes uc ON u.id = uc.user_id
                                     WHERE uc.carte_id = ?");
        $stmt->execute([$carteId]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

}
