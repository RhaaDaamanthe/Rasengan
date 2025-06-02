<?php
require_once 'src/Initialisation/session_Auth.php';
require_once 'src/config/database.php';
require_once 'src/services/AuthService.php';

// Rediriger l'utilisateur connecté vers sa collection
if (isset($_SESSION['user_id']) && !isset($_GET['redirect'])) {
    header("Location: collection.php");
    exit;
}


$errors = [];
$email = '';
$success_message = '';

// Afficher un message si l'inscription a réussi
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $success_message = "Inscription réussie ! Veuillez vous connecter.";
}

// Traitement du formulaire de connexion
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    $authService = new AuthService($pdo);
    $result = $authService->login($email, $password);

    if (isset($result['errors'])) {
        $errors = $result['errors'];
    } elseif (isset($result['user'])) {
        $user = $result['user'];
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['pseudo'] = $user['pseudo'];
        $_SESSION['is_admin'] = (bool)$user['is_admin'];
        header("Location: index.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE-edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion</title>
    <link rel="stylesheet" href="css/connexion.css" />
    <link rel="stylesheet" href="css/header.css" />
    <link rel="stylesheet" href="css/footer.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet"/>
</head>
<body>
<header>
    <nav class="navbar">
        <a href="index.php" class="logo">RASENGAN</a>
        <div class="nav-links">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="catalogue.php">Catalogue</a></li>
                <li><a href="collection.php">Collection des joueurs</a></li>
                <li class="active"><a href="compte.php">Connexion</a></li>
                <li><a href="inscription.php">Inscription</a></li>
            </ul>
        </div>
        <img src="./Images/burger.png" alt="Menu Hamburger" class="menu-burger" />
    </nav>
</header>

<main>
    <div class="wrapper">
        <form method="POST" action="">
            <h1>Se connecter</h1>

            <?php if (!empty($success_message)): ?>
                <div class="success-message" style="color: green; margin-bottom: 15px;">
                    <p><?= htmlspecialchars($success_message) ?></p>
                </div>
            <?php endif; ?>

            <?php if (!empty($errors)): ?>
                <div class="error-messages" style="color: red; margin-bottom: 15px;">
                    <?php foreach ($errors as $error): ?>
                        <p><?= htmlspecialchars($error) ?></p>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>

            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required value="<?= htmlspecialchars($email) ?>" />
                <i class='bx bx-envelope'></i>
            </div>

            <div class="input-box">
                <input type="password" name="password" placeholder="Mot de passe" required>
                <i class='bx bxs-lock-alt'></i>
            </div>

            <div class="bouton-connexion">
                <button type="submit" name="login" class="btn">Se connecter</button>
            </div>

            <p class="inscription">
                Je n'ai pas de <span>compte</span>. Je m'en
                <a href="inscription.php"><span>créer</span></a> un.
            </p>

            <div class="social-media">
                <a href="https://discord.gg/kyfQZbnkjy" target="_blank"><i class="fa-brands fa-discord"></i></a>
                <a href="https://www.tiktok.com/@rhaadaamanthe_" target="_blank"><i class="fa-brands fa-tiktok"></i></a>
            </div>
        </form>
    </div>
</main>

<footer>
    <p>© 2024 - Rasengan</p>
    <a href="https://discord.gg/kyfQZbnkjy" target="_blank">Rejoindre</a>
</footer>

<script src="js/main.js"></script>
</body>
</html>
