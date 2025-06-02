<?php

namespace Repository;
require_once __DIR__ . '/../Model/Film.php';

use Model\Film;
use PDO;

class FilmsRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAllFilm(): array
    {
        $query = "SELECT * FROM films ORDER BY id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $raretes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $raretes[] = new Film(
                (int)$row['id'],
                $row['nom']
            );
        }

        return $raretes;
    }
}