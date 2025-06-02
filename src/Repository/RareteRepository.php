<?php

namespace Repository;

use Model\Rarete;
use PDO;
require_once __DIR__ . '/../Model/Rarete.php';

class RareteRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAllRaretes(): array
    {
        $query = "SELECT * FROM raretes ORDER BY id_rarete;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $raretes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $raretes[] = new Rarete(
                (int)$row['id_rarete'],
                (int)$row['quantite'],
                $row['libelle'],
            );
        }

        return $raretes;
    }
}