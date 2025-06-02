<?php

namespace Repository;

use Model\Anime;
use PDO;
require_once __DIR__ . '/../Model/Anime.php';

class AnimeRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAllAnime(): array
    {
        $query = "SELECT * FROM animes ORDER BY id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $raretes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $raretes[] = new Anime(
                (int)$row['id'],
                $row['nom']
            );
        }

        return $raretes;
    }
}