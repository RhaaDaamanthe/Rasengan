<?php

namespace Repository;

use Model\Utilisateur;
use PDO;
require_once __DIR__ . '/../Model/Utilisateur.php';
class UtilisateursRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAllUsers(): array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs");
        $stmt->execute();

        $utilisateurs = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $utilisateurs[] = new Utilisateur(
                (int)$row['id'],
                $row['pseudo'],
                $row['email'],
                $row['password'],
                (bool)$row['is_admin']
            );
        }

        return $utilisateurs;
    }

    //fonction pour vérifier la bonne connexion de l'utilisateur
    public function verifConnexion(string $login, string $password): ?Utilisateur
    {
    //requête pour check le si le login existe dans la base de données
    $sql = "SELECT * FROM utilisateurs WHERE pseudo = :login OR email = :login";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([':login' => $login]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //utilisation de la fonction native password_verify
    //si toutes les informations sont correctes alors le password est vérifié puis accepté
    if ($row && password_verify($password, $row['password'])) {
        return new Utilisateur(
            id: (int) $row['id'],
            pseudo: $row['pseudo'],
            email: $row['email'],
            isAdmin: (bool) $row['isAdmin']
        );
    }
        
    return null;
    }
}
