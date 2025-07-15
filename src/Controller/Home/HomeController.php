<?php

namespace App\Controller\Home;

class HomeController
{
    public function __invoke(): void
    {
        //page d'accueil du site
         require_once __DIR__ . '/../../../public/Html/Home/home.php';
    }
}
