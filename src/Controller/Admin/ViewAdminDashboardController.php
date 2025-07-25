<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;
use App\Database\DBConnexion;

class ViewAdminDashboardController extends AbstractController
{
    public function __invoke(): void
    {
        
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->requireLogin();
        $this->requireAdmin();

        // Connexion à la base de données
        $pdo = DBConnexion::getOrCreateInstance()->getPdo();

        require_once __DIR__ . '/../../../public/Html/Admin/dashboard.php';
    }
}
