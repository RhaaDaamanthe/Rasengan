<?php

class AuthService
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function login(string $email, string $password): array {
        $errors = [];

        if (empty($email)) {
            $errors[] = "L'email est requis.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "L'email n'est pas valide.";
        }

        if (empty($password)) {
            $errors[] = "Le mot de passe est requis.";
        }

        if (!empty($errors)) {
            return ['errors' => $errors];
        }

        $stmt = $this->pdo->prepare("SELECT id, pseudo, email, password, is_admin FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($password, $user['password'])) {
            return ['errors' => ["Email ou mot de passe incorrect."]];
        }

        return ['user' => $user];
    }
}