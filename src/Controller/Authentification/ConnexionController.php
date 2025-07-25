<?php

namespace App\Controller\Authentification;

//use
use App\Controller\AbstractController;
use App\Database\DBConnexion;
use PDO;
use App\Repository\UtilisateursRepository;

class ConnexionController extends AbstractController
{
    private \PDO $pdo;

    public function __construct() {
        $this->pdo = DBConnexion::getOrCreateInstance()->getPdo();
    }

    public function __invoke(): void {

        session_start();

        if (isset($_SESSION['user_id']) && !isset($_GET['redirect'])) {
            $this->redirect('/');
        }

        $errors = [];
        $email = '';
        $success_message = '';

        if (isset($_GET['success']) && $_GET['success'] == 1) {
            $success_message = "Connexion réussie ! Veuillez vous connecter.";
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $password = $_POST['password'] ?? '';

            if (empty($email)) {
                $errors[] = "L'email est requis.";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $errors[] = "L'email n'est pas valide.";
            }

            if (empty($password)) {
                $errors[] = "Le mot de passe est requis.";
            }

            if (empty($errors)) {
                $repo = new UtilisateursRepository($this->pdo);
                $userRow = $repo->getUserByEmail($email);

                if (!$userRow || !password_verify($password, $userRow['password'])) {
                    $errors[] = "Email ou mot de passe incorrect.";
                } else {
                    $_SESSION['user_id'] = $userRow['id'];
                    $_SESSION['pseudo'] = $userRow['pseudo'];
                    $_SESSION['is_admin'] = (int)$userRow['is_admin'];


                    $this->redirect('/');
                }
            }
        }

        require_once __DIR__ . '/../../../public/Html/Connexion/connexion.php';
    }
}
