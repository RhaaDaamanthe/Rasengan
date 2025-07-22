<?php

namespace App\Catalogue\Repository;

use PDO;

class CatalogueRepository
{
    public function __construct(private PDO $pdo) {}

    public function getAnimesWithCardCount(): array
    {
        $stmt = $this->pdo->query("SELECT anime, COUNT(*) AS card_count FROM cartes WHERE type = 'anime' GROUP BY anime");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getFilmsWithCardCount(): array
    {
        $stmt = $this->pdo->query("SELECT film, COUNT(*) AS card_count FROM cartes WHERE type = 'film' GROUP BY film");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
