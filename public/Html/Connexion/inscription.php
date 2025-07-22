<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE-edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="/Css/inscription.css">
    <link rel="stylesheet" href="/Css/header.css"/>
    <link rel="stylesheet" href="/Css/footer.css"/>
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
        <a href="/" class="logo">RASENGAN</a>
        <div class="nav-links">
          <ul>
            <li><a href="/">Accueil</a></li>
            <li><a href="/catalogue">Catalogue</a></li>
            <li><a href="/collection">Collection des joueurs</a></li>
            <li><a href="/compte">Connexion</a></li>
            <li class="active"><a href="/inscription">Inscription</a></li>
          </ul>
        </div>
        <img
          src="/Images/burger.png"
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
    <script src="/js/main.js"></script>
</body>
</html>
