<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cartes - Administration</title>
    <link rel="stylesheet" href="/CSS/admin-cartes.css">
</head>
<body>
    <h1>Gestion des Cartes</h1>

    <p>
        <a href="/admin/<?= $type ?>-cartes/ajouter" class="btn-ajouter">
            ➕ Ajouter une carte <?= $type === 'film' ? 'film' : 'anime' ?>
        </a>
    </p>

    <div class="carte-container">
        <?php foreach ($cartes as $carte): ?>
            <div class="carte">
                <img src="/<?= htmlspecialchars($carte->getImagePath()) ?>" alt="<?= htmlspecialchars($carte->getNom()) ?>">
                <h3><?= htmlspecialchars($carte->getNom()) ?></h3>
                <p><strong><?= $type === 'film' ? $carte->getFilm()->getNom() : $carte->getAnime()->getNom() ?></strong></p>
                <p><?= htmlspecialchars($carte->getRarete()->getLibelle()) ?></p>

                <div class="actions">
                    <a href="/admin/<?= $type ?>-cartes/modifier/<?= $carte->getId() ?>">✏️</a>
                    <form action="/admin/<?= $type ?>-cartes/supprimer/<?= $carte->getId() ?>" method="POST" onsubmit="return confirm('Supprimer cette carte ?');">
                        <button type="submit">🗑️</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
