<?php

namespace App\Controller\Home;

class HomeController
{
   public function __invoke(): void
    {
        session_start();

        $pseudo = $_SESSION['pseudo'] ?? null;

        require_once __DIR__ . '/../../../public/Html/Home/home.php';
    }
}
