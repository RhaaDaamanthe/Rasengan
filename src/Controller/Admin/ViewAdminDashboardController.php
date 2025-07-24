<?php

namespace App\Controller\Admin;

use App\Controller\AbstractController;

class AdminDashboardController extends AbstractController
{
    public function __invoke(): void
    {
        session_start();
        $this->requireLogin();
        $this->requireAdmin();

        // Affiche la page HTML de configuration admin
        require_once __DIR__ . '/../../../public/Html/admin/dashboard.php';
    }
}
