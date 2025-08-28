<?php

namespace App\Repository;

use PDO;

class UtilisateurCarteAnimeRepository
{
    public function __construct(private PDO $pdo) {}

    /** Récupère toutes les cartes anime d'un utilisateur */
    public function getCollectionAnimeByUserId(int $userId): array
    {
        $sql = "
            SELECT 
                ac.carte_id,
                ac.quantite,
                c.nom AS carte_nom,
                c.image AS image_path   -- adapte si ta colonne s'appelle autrement (ex: image_path)
            FROM utilisateurs_cartes_animes ac
            JOIN cartes_animes c ON ac.carte_id = c.id
            WHERE ac.user_id = ?
            ORDER BY c.id_rarete DESC, c.id ASC
        ";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
