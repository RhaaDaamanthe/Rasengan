<?php
/** @var array $cartes */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Cartes Animés - Catalogue</title>
    <link rel="stylesheet" href="/Css/styles.css">
    <link rel="stylesheet" href="/Css/header.css">
    <link rel="stylesheet" href="/Css/footer.css">
</head>
<body>
<?php require_once __DIR__ . '/../Partials/header.php'; ?>

<main>
    <h1>Catalogue des cartes animés</h1>

    <div class="catalogue2">
        <?php foreach ($cartes as $carte): ?>
            <div class="card" data-anime="<?= htmlspecialchars($carte['anime']) ?>" data-rarete="<?= $carte['id_rarete'] ?>">
                <img src="/<?= htmlspecialchars($carte['image_path']) ?>" alt="<?= htmlspecialchars($carte['nom']) ?>">
                <div class="card-content">
                    <h2 class="card-title"><?= htmlspecialchars($carte['nom']) ?></h2>
                    <p class="card-description"><?= htmlspecialchars($carte['description']) ?></p>
                    <p class="card-rarete"><?= htmlspecialchars($carte['rarete_libelle']) ?></p>

                    <?php if (!empty($carte['info_sup'])): ?>
                        <p class="card-extra"><?= htmlspecialchars($carte['info_sup']) ?></p>
                    <?php endif; ?>

                    <?php if (!empty($carte['proprietaires'])): ?>
                        <p class="owners">Propriétaires : <?= htmlspecialchars(implode(', ', $carte['proprietaires'])) ?></p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>

<?php require_once __DIR__ . '/../Partials/footer.php'; ?>
<script src="/Js/main.js"></script>
</body>
</html>

