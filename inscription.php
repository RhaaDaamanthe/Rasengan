<?php
require_once 'src/Initialisation/session_Auth.php';
require_once 'src/config/database.php';

if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit;
}

$errors = [];
$pseudo = '';
$email = '';

if (isset($_POST['envoi'])) {
    $pseudo = trim($_POST['pseudo']);
    $email = trim($_POST['email']);
    $password1 = $_POST['password1'] ?? '';
    $password2 = $_POST['password2'] ?? '';

    // 🔒 Validation
    if (empty($pseudo) || strlen($pseudo) < 3) {
        $errors[] = "Le pseudo doit contenir au moins 3 caractères.";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "L'email n'est pas valide.";
    } else {
        // Vérifier si l'email est déjà pris
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->fetchColumn() > 0) {
            $errors[] = "Cet email est déjà utilisé.";
        }
    }

    if (strlen($password1) < 8) {
        $errors[] = "Le mot de passe doit contenir au moins 8 caractères.";
    }

    if ($password1 !== $password2) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    // ✅ Inscription
    if (empty($errors)) {
        $hashed_password = password_hash($password1, PASSWORD_DEFAULT);
        try {
            $stmt = $pdo->prepare("INSERT INTO utilisateurs (pseudo, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$pseudo, $email, $hashed_password]);
            header("Location: compte.php?success=1");
            exit;
        } catch (PDOException $e) {
            error_log("Erreur d'inscription : " . $e->getMessage());
            $errors[] = "Une erreur est survenue. Veuillez réessayer plus tard.";
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
    <title>Inscription</title>
    <link rel="stylesheet" href="css/inscription.css">
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
            <li><a href="compte.php">Connexion</a></li>
            <li class="active"><a href="inscription.php">Inscription</a></li>
          </ul>
        </div>
        <img
          src="./Images/burger.png"
          alt="Menu Hamburger "
          class="menu-burger"
        />
      </nav>
    </header>
    <main>
    <div class="wrapper">
      <form action="" method="POST">
            <h1>Inscription</h1>
            <?php if (!empty($errors)): ?>
    <div class="error-messages" style="color: red; margin-bottom: 15px;">
        <?php foreach ($errors as $error): ?>
            <p><?= htmlspecialchars($error) ?></p>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<div class="input-box">
    <input type="text" name="pseudo" placeholder="Pseudo" required value="<?= isset($pseudo) ? htmlspecialchars($pseudo) : '' ?>">
    <i class='bx bxs-user'></i>
</div>
<div class="input-box">
    <input type="email" name="email" placeholder="Email" required value="<?= isset($email) ? htmlspecialchars($email) : '' ?>">
    <i class='bx bx-envelope' ></i>
</div>
            <div class="input-box">
                <input type="password" name="password1" placeholder="Mot de passe" minlength="8" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <div class="input-box">
                <input type="password" name="password2" placeholder="Confirmer mot de passe" minlength="8" required>
                <i class='bx bxs-lock-alt' ></i>
            </div>
            <button type="submit" name="envoi" class="btn">S'inscrire</button>
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