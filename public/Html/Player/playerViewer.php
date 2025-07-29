<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil de <?= htmlspecialchars($utilisateur->getPseudo()) ?></title>
    <link rel="stylesheet" href="/css/styles.css">
</head>
<body>
    <header>
        <h1>Profil de <?= htmlspecialchars($utilisateur->getPseudo()) ?></h1>
    </header>

    <main>
        <p><strong>Pseudo :</strong> <?= htmlspecialchars($utilisateur->getPseudo()) ?></p>
        <p><strong>Email :</strong> (privé)</p>
        <p><strong>Statut :</strong> <?= $utilisateur->isAdmin() ? 'Administrateur' : 'Joueur' ?></p>

        <a href="/collection/joueur/<?= $utilisateur->getId() ?>/anime">Voir sa collection d'animes</a><br>
        <a href="/collection/joueur/<?= $utilisateur->getId() ?>/film">Voir sa collection de films</a>
    </main>

    <footer>
        <a href="/collection">Retour à ma collection</a>
    </footer>
</body>
</html>
