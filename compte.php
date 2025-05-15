<?php
session_start();

// Vérifier si l'utilisateur est déjà connecté
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

// Paramètres de connexion à la base de données
$host = 'localhost';
$dbname = 'rasengan_db';
$username = 'root'; // Change avec ton nom d'utilisateur MySQL
$password = ''; // Change avec ton mot de passe MySQL

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Échec de la connexion : " . $e->getMessage());
}

// Initialisation des variables
$errors = [];
$email = '';
$success_message = '';

// Vérifier si l'inscription a réussi
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $success_message = "Inscription réussie ! Veuillez vous connecter.";
}

// Vérifier si le formulaire de connexion est soumis
if (isset($_POST['login'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    // Validation
    if (empty($email)) {
        $errors[] = "L'email est requis.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email n'est pas valide.";
    }

    if (empty($password)) {
        $errors[] = "Le mot de passe est requis.";
    }

    // Si pas d'erreurs, vérifier les identifiants
    if (empty($errors)) {
        // Journaliser l'email tenté
        error_log("Tentative de connexion avec email: $email");
        
        $stmt = $pdo->prepare("SELECT id, pseudo, email, password, is_admin FROM users WHERE email = ?");
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Journaliser que l'utilisateur a été trouvé
            error_log("Utilisateur trouvé: " . $user['email'] . ", pseudo: " . $user['pseudo']);
            // Vérifier le mot de passe
            if (password_verify($password, $user['password'])) {
                // Connexion réussie
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['pseudo'] = $user['pseudo'];
                $_SESSION['is_admin'] = (bool)$user['is_admin']; // Stocker le statut admin
                error_log("Connexion réussie pour user_id: " . $user['id'] . ", is_admin: " . ($user['is_admin'] ? 'true' : 'false'));
                header("Location: index.php");
                exit;
            } else {
                error_log("Échec de la vérification du mot de passe pour email: $email");
                $errors[] = "Email ou mot de passe incorrect.";
            }
        } else {
            error_log("Aucun utilisateur trouvé pour email: $email");
            $errors[] = "Email ou mot de passe incorrect.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="css/connexion.css">
    <link rel="stylesheet" href="css/header.css"/>
    <link rel="stylesheet" href="css/footer.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
      integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <link
      href="https://fonts.googleapis.com/css2?family=Hammersmith+One&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"/>
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
        <img
          src="./Images/burger.png"
          alt="Menu Hamburger "
          class="menu-burger"/>
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
      <input type="email" name="email" placeholder="Email" required value="<?= isset($email) ? htmlspecialchars($email) : '' ?>" />
      <i class='bx bx-envelope' ></i>
    </div>
    <div class="input-box">
      <input type="password" name="password" placeholder="Mot de passe" required>
      <i class='bx bxs-lock-alt' ></i>
    </div>
    <div class="bouton-connexion">
      <button type="submit" name="login" class="btn">Se connecter</button>
    </div>
    <p class="inscription">Je n'ai pas de <span>compte</span>. Je m'en <a href="inscription.php"><span>créer</span></a> un.</p>
    <div class="social-media">
        <a href="https://discord.gg/kyfQZbnkjy" target="_blank">
            <p><i class="fa-brands fa-discord"></i></p>
        </a>
        <a href="https://www.tiktok.com/@rhaadaamanthe_" target="_blank">
            <p><i class="fa-brands fa-tiktok"></i></p>
        </a>
    </div>
    </form>
    </div>
    </main>
    <footer>
      <p>© 2024 - Rasengan</p>
      <a href="https://discord.gg/kyfQZbnkjy" target="_blank"> Rejoindre</a>
    </footer>
    <script src="js/main.js"></script>
</body>
</html>