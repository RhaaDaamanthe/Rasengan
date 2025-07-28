<?php

namespace App\Repository;

use App\Model\Utilisateur;
use PDO;

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
                (bool)$row['is_admin']
            );
        }

        return $utilisateurs;
    }

    public function getUserById(int $id): ?Utilisateur
    {
    $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE id = :id");
    $stmt->execute(['id' => $id]);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        return new Utilisateur(
            id: (int) $row['id'],
            pseudo: $row['pseudo'],
            email: $row['email'],
            isAdmin: (bool) $row['is_admin']
            );
        }

    return null;
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

    public function getUserByEmail(string $email): ?array
    {
    $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
    $stmt->execute(['email' => $email]);

    $user = $stmt->fetch(\PDO::FETCH_ASSOC); // <<< important !

    return $user ?: null;
    }

    
    public function createUtilisateur(string $pseudo, string $email, string $passwordHash): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO utilisateurs (pseudo, email, password, is_admin) VALUES (:pseudo, :email, :password, 0)");
        $stmt->execute([
            'pseudo' => $pseudo,
            'email' => $email,
            'password' => $passwordHash
        ]);
    }

    public function emailExists(string $email): bool
    {
        $stmt = $this->pdo->prepare("SELECT 1 FROM utilisateurs WHERE email = :email LIMIT 1");
        $stmt->execute(['email' => $email]);

        return (bool) $stmt->fetchColumn();
    }

}
