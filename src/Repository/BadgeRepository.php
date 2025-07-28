<?php

namespace App\Repository;

use PDO;

class BadgeRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAllBadges(): array
    {
        $query = "SELECT * FROM badges ORDER BY id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBadgesByUser(int $userId): array
    {
        $query = "
            SELECT b.id, b.nom, b.description, b.image_path, ub.date_obtention
            FROM utilisateurs_badges ub
            JOIN badges b ON ub.badge_id = b.id
            WHERE ub.user_id = :user_id
        ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function hasUserBadge(int $userId, int $badgeId): bool
    {
        $query = "SELECT 1 FROM utilisateurs_badges WHERE user_id = :user_id AND badge_id = :badge_id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            'user_id' => $userId,
            'badge_id' => $badgeId
        ]);
        return (bool) $stmt->fetchColumn();
    }

    public function assignBadgeToUser(int $userId, int $badgeId): void
    {
        if (!$this->hasUserBadge($userId, $badgeId)) {
            $query = "INSERT INTO utilisateurs_badges (user_id, badge_id) VALUES (:user_id, :badge_id)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                'user_id' => $userId,
                'badge_id' => $badgeId
            ]);
        }
    }

    public function getBadgeById(int $badgeId): ?array
    {
        $query = "SELECT * FROM badges WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $badgeId]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row ?: null;
    }

    /**
     * Retourne les badges avec nombre de possesseurs
     */
    public function getBadgesWithUserCount(): array
    {
        $query = "
            SELECT b.id, b.nom, b.description, b.image_path, COUNT(ub.user_id) AS user_count
            FROM badges b
            LEFT JOIN utilisateurs_badges ub ON b.id = ub.badge_id
            GROUP BY b.id, b.nom, b.description, b.image_path
            ORDER BY b.id
        ";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
