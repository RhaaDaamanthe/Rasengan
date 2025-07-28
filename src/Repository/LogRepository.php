<?php

namespace App\Repository;

use App\Model\CarteLog;
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
        $query = "
            SELECT cl.*, u.pseudo,
                COALESCE(ca.nom, cf.nom) AS carte_nom
            FROM cartes_logs cl
            JOIN utilisateurs u ON cl.user_id = u.id
            LEFT JOIN cartes_animes ca ON cl.type = 'anime' AND cl.carte_id = ca.id
            LEFT JOIN cartes_films cf ON cl.type = 'film' AND cl.carte_id = cf.id
            ORDER BY cl.date_action DESC
            LIMIT :limit
        ";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['limit' => $limit]);

        $logs = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $logs[] = new CarteLog(
                (int)$row['id'],
                (int)$row['user_id'],
                (int)$row['carte_id'],
                $row['type'],
                $row['action'],
                $row['date_action'],
                $row['pseudo'],
                $row['carte_nom']
            );
        }

        return $logs;
    }

}
