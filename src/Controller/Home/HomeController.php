<?php

namespace App\Controller\Home;

//use
use App\Controller\AbstractController;

class HomeController extends AbstractController
{
   public function __invoke(): void
    {
        session_start();

        $pseudo = $_SESSION['pseudo'] ?? null;

        require_once __DIR__ . '/../../../public/Html/Home/home.php';
    }
}
