<?php

namespace Repository;

use PDO;
use src\Initialisation\DBConnexion;

class CatalogueAnimeRepository
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = DBConnexion::getOrCreateInstance()->getPdo();
    }

    public function getAllCartesWithRarityInfo(): array
    {
        $sql = "SELECT ca.id, ca.nom, a.nom AS anime, ca.id_rarete, ca.image_path, ca.description, r.libelle AS rarete_libelle
                FROM cartes_animes ca
                JOIN raretes r ON ca.id_rarete = r.id_rarete
                LEFT JOIN animes a ON ca.id_anime = a.id
                ORDER BY ca.id_rarete DESC, ca.id ASC";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $cartes = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $carte = $row;
            $carte['info_sup'] = '';

            if (in_array($row['id_rarete'], [6, 5, 4])) {
                $stmt2 = $this->pdo->prepare("SELECT u.pseudo FROM utilisateurs u JOIN utilisateurs_cartes_animes uc ON u.id = uc.user_id WHERE uc.carte_id = ? LIMIT 1");
                $stmt2->execute([$row['id']]);
                $carte['info_sup'] = $stmt2->fetchColumn() ?: 'Aucun';
            } elseif (in_array($row['id_rarete'], [3, 2, 1])) {
                $stmt3 = $this->pdo->prepare("SELECT SUM(quantite) as total FROM utilisateurs_cartes_animes WHERE carte_id = ?");
                $stmt3->execute([$row['id']]);
                $total = $stmt3->fetchColumn() ?: 0;

                $max = ($row['id_rarete'] === 3) ? 2 : 3;
                $carte['info_sup'] = "Prises : $total/$max";

                $stmt4 = $this->pdo->prepare("SELECT u.pseudo FROM utilisateurs u JOIN utilisateurs_cartes_animes uc ON u.id = uc.user_id WHERE uc.carte_id = ?");
                $stmt4->execute([$row['id']]);
                $carte['owners'] = $stmt4->fetchAll(PDO::FETCH_COLUMN);
            }

            $cartes[] = $carte;
        }

        return $cartes;
    }
}
