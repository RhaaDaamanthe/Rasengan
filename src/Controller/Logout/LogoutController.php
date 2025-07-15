<?php

namespace App\Controller\Logout;

class LogoutController
{
    public function __invoke(): void
    {
        //on récupère la collection des joueurs
         require_once __DIR__ . '/../../../public/Html/Logout/logout.php';
    }
}
