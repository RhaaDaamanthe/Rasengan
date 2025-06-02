<?php

namespace Repository;

use Model\Utilisateur;
use PDO;
require_once __DIR__ . '/../Model/Utilisateur.php';
class UtilisateursRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAllUsers(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs");
        $stmt->execute();

        $utilisateurs = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $utilisateurs[] = new Utilisateur(
                (int)$row['id'],
                $row['pseudo'],
                $row['email'],
                $row['password'],
                (bool)$row['is_admin']
            );
        }

        return $utilisateurs;
    }
}