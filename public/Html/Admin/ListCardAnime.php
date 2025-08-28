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

    <form method="GET" class="filtres">
    <select name="rarete">
        <option value="">-- Toutes raretés --</option>
        <?php foreach ($raretes as $r): ?>
            <option value="<?= $r['id_rarete'] ?>" <?= (isset($_GET['rarete']) && $_GET['rarete'] == $r['id_rarete']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($r['libelle']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <select name="anime">
        <option value="">-- Tous animes --</option>
        <?php foreach ($animes as $a): ?>
            <option value="<?= $a['id'] ?>" <?= (isset($_GET['anime']) && $_GET['anime'] == $a['id']) ? 'selected' : '' ?>>
                <?= htmlspecialchars($a['nom']) ?>
            </option>
        <?php endforeach; ?>
    </select>

    <button type="submit">Filtrer</button>
    </form>


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
