<?php

namespace App\Controller\Authentification;

//use
use App\Controller\AbstractController;
use App\Repository\UtilisateursRepository;
use App\Database\DBConnexion;

class InscriptionController extends AbstractController {
    public function __invoke(): void
    {
        session_start();

        //si jamais l'utilisateur est déjà connecté
        if (isset($_SESSION['user_id'])) {
            $this->redirect('/collection');
        }

        $errors = [];
        $pseudo = '';
        $email = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $pseudo = trim($_POST['pseudo'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $password1 = $_POST['password1'] ?? '';
            $password2 = $_POST['password2'] ?? '';

            // === Validation
            if (empty($pseudo)) {
                $errors[] = "Le pseudo est requis.";
            }

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'email est invalide.";
            }

            if (strlen($password1) < 8) {
                $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
            }

            if ($password1 !== $password2) {
                $errors[] = "Les mots de passe ne correspondent pas.";
            }

            // === Vérifier si l'email existe déjà
            if (empty($errors)) {
                $pdo = DBConnexion::getOrCreateInstance()->getPdo();
                $repo = new UtilisateursRepository($pdo);

                if ($repo->emailExists($email)) {
                    $errors[] = "Cet email est déjà utilisé.";
                } else {
                    $hash = password_hash($password1, PASSWORD_DEFAULT);
                    $repo->createUtilisateur($pseudo, $email, $hash);
                    $this->redirect('/connexion?success=1');
                }
            }
        }

        // Affichage du formulaire avec erreurs potentielles
        require_once __DIR__ . '/../../../public/Html/Connexion/inscription.php';
    }
}
