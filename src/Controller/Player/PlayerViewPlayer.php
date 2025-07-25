<?php

namespace App\Controller\Player;
//Il s'agit du controller pour voir en read-only les profils des autres joueurs
//use
use App\Controller\AbstractController;

class PlayerViewPlayer extends AbstractController
{
    public function __invoke(): void
    {
        //récupération de l'utilisateur connecté
        session_start();
        //on oblige l'utilisateur à se connecter pour pouvoir rentrer sur la page
        $this->requireLogin();

        //la vue 
        require_once __DIR__ . '/../../../public/Html/Player/player.php';
    }
}
