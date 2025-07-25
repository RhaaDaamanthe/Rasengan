<?php

namespace App\Controller\Collection\PlayerCollection;
//Page intermédiaire pour un joueur, cela donne un choix entre Anime et Film
//use
use App\Controller\AbstractController;

class CollectionPlayerController extends AbstractController
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
