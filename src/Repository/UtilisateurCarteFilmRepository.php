<?php

namespace App\Repository;

use PDO;

class UtilisateurCarteFilmRepository {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    //récupération de la collection d'anime pour un utilisateur
    //modifier la requête (sécurisation)
    public function getCollectionFilmByUserId(int $userId): array {
        $sql = "SELECT ac.*, c.nom, c.image 
                FROM utilisateurs_cartes_films ac
                JOIN cartes_films c ON ac.carte_id = c.id
                WHERE ac.user_id = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
