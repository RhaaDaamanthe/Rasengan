<?php

namespace App\Repository;

use PDO;

class UtilisateurCarteFilmRepository
{
    public function __construct(private PDO $pdo) {}

    /** Récupère toutes les cartes film d'un utilisateur */
    public function getCollectionFilmByUserId(int $userId): array
    {
        $sql = "
            SELECT
                uf.carte_id,
                uf.quantite,
                cf.nom                          AS nom,
                cf.image_path                   AS image_path,
                cf.id_rarete                    AS id_rarete,
                f.nom                           AS film
            FROM utilisateurs_cartes_films uf
            JOIN cartes_films cf ON uf.carte_id = cf.id
            LEFT JOIN films f ON cf.id_film = f.id
            WHERE uf.user_id = ?
            ORDER BY cf.id_rarete DESC, cf.id ASC
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
