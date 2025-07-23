<?php

namespace App\Repository;

use PDO;

class BadgeRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Récupère tous les badges disponibles
     */
    public function getAllBadges(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM badges");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère les badges d'un utilisateur donné
     */
    public function getBadgesByUser(int $userId): array
    {
        $stmt = $this->pdo->prepare("
            SELECT b.id, b.nom, b.description, b.image_path, ub.date_obtention
            FROM utilisateurs_badges ub
            JOIN badges b ON ub.badge_id = b.id
            WHERE ub.user_id = :user_id
        ");
        $stmt->execute(['user_id' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Vérifie si un utilisateur possède déjà un badge
     */
    public function hasUserBadge(int $userId, int $badgeId): bool
    {
        $stmt = $this->pdo->prepare("SELECT 1 FROM utilisateurs_badges WHERE user_id = :user_id AND badge_id = :badge_id");
        $stmt->execute([
            'user_id' => $userId,
            'badge_id' => $badgeId
        ]);
        return (bool) $stmt->fetchColumn();
    }

    /**
     * Attribue un badge à un utilisateur (si non déjà attribué)
     */
    public function assignBadgeToUser(int $userId, int $badgeId): void
    {
        if (!$this->hasUserBadge($userId, $badgeId)) {
            $stmt = $this->pdo->prepare("INSERT INTO utilisateurs_badges (user_id, badge_id) VALUES (:user_id, :badge_id)");
            $stmt->execute([
                'user_id' => $userId,
                'badge_id' => $badgeId
            ]);
        }
    }

    /**
     * Récupère un badge par son ID
     */
    public function getBadgeById(int $badgeId): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM badges WHERE id = :id");
        $stmt->execute(['id' => $badgeId]);
        $badge = $stmt->fetch(PDO::FETCH_ASSOC);
        return $badge ?: null;
    }
}
