<?php

namespace App\Controller\Connexion;

class ConnexionController {
   private PDO $pdo;

    public function __construct() {
        $this->pdo = DBConnexion::getOrCreateInstance()->getPdo();
    }

    public function __invoke(): void {
        session_start();

        //rediriger l'utilisateur connecté vers sa collection
        //juste besoin de changer la route dans location pour le rediriger autres part
        if (isset($_SESSION['user_id']) && !isset($_GET['redirect'])) {
            header("Location: /collection");
            exit;
        }

        $errors = [];
        $email = '';
        $success_message = '';

        //préviens l'utilisateur que l'inscriptions est valide
        if (isset($_GET['success']) && $_GET['success'] == 1) {
            $success_message = "Inscription réussie ! Veuillez vous connecter.";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            //rend le champ e-mail obligatoire pour se connecter
            if (empty($email)) {
                $errors[] = "L'email est requis.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'email n'est pas valide.";
            }

             //rend le champ password obligatoire pour se connecter
            if (empty($password)) {
                $errors[] = "Le mot de passe est requis.";
            }

            if (empty($errors)) {
                $repo = new UtilisateursRepository($this->pdo);
                $stmt = $this->pdo->prepare("SELECT * FROM utilisateurs WHERE email = :email");
                $stmt->execute([':email' => $email]);
                $userRow = $stmt->fetch(PDO::FETCH_ASSOC);

                if (!$userRow || !password_verify($password, $userRow['password'])) {
                    $errors[] = "Email ou mot de passe incorrect.";
                } else {
                    $_SESSION['user_id'] = $userRow['id'];
                    $_SESSION['pseudo'] = $userRow['pseudo'];
                    $_SESSION['is_admin'] = (bool)$userRow['is_admin'];

                    header("Location: /collection");
                    exit;
                }
            }
        }

        //affiche la page de connexion
        require_once __DIR__ . '/../../../public/Html/Connexion/connexion.php';
    }
}
