<?php

namespace App\Repository;

use PDO;

class LogRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getDerniersLogs(int $limit = 10): array
    {
        $stmt = $this->pdo->query("
            SELECT cl.*, u.pseudo,
                   COALESCE(ca.nom, cf.nom) AS carte_nom
            FROM cartes_logs cl
            JOIN utilisateurs u ON cl.user_id = u.id
            LEFT JOIN cartes_animes ca ON cl.type = 'anime' AND cl.carte_id = ca.id
            LEFT JOIN cartes_films cf ON cl.type = 'film' AND cl.carte_id = cf.id
            ORDER BY cl.date_log DESC
            LIMIT $limit
        ");
        return $stmt->fetchAll();
    }
}
