<?php

namespace App\Controller\Admin\Badge;

use App\Controller\AbstractController;
use App\Repository\BadgeRepository;
use App\Database\DBConnexion;

class ListBadgeController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireAdmin();

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $repo = new BadgeRepository($pdo);
        $badges = $repo->getAllBadges();

        require_once __DIR__ . '/../../../public/Html/Badges/list_all_badges.php';
    }
}

