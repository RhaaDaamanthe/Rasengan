<?php

namespace App\Controller\Account;

use App\Controller\AbstractController;
use App\Repository\BadgeRepository;
use App\Database\DBConnexion;

class ListUserBadgeController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();

        $userId = $_SESSION['user_id'];

        $pdo = DBConnexion::getOrCreateInstance()->getPdo();
        $repo = new BadgeRepository($pdo);
        $badges = $repo->getBadgesByUser($userId);

        require_once __DIR__ . '/../../../public/Html/Badges/user_badges.php';
    }
}
