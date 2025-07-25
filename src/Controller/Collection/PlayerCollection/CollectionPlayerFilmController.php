<?php

namespace App\Controller\Collection\PlayerCollection;
//Affiche toutes les carte film d'un joueur
//use
use App\Controller\AbstractController;

class CollectionPlayerFilmController extends AbstractController
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
