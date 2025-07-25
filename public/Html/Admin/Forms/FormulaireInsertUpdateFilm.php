<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title><?= isset($carte) ? 'Modifier' : 'Ajouter' ?> une carte film</title>
    <link rel="stylesheet" href="/CSS/style.css">
</head>
<body>
    <h1><?= isset($carte) ? 'Modifier' : 'Ajouter' ?> une carte film</h1>

    <form action="<?= isset($carte) ? '/admin/film-cartes/modifier/' . $carte->getId() : '/admin/film-cartes/ajouter' ?>" method="post" enctype="multipart/form-data">
        <label>Nom :</label>
        <input type="text" name="nom" required value="<?= $carte ? htmlspecialchars($carte->getNom()) : '' ?>">

        <label>Description :</label>
        <textarea name="description"><?= $carte ? htmlspecialchars($carte->getDescription()) : '' ?></textarea>

        <label>Film :</label>
        <input type="text" name="film" required value="<?= $carte ? htmlspecialchars($carte->getFilm()) : '' ?>">

        <label>Image :</label>
        <input type="file" name="image">
        <?php if ($carte): ?>
            <div>
                <strong>Image actuelle :</strong><br>
                <img src="/<?= $carte->getImagePath() ?>" alt="Carte" style="max-height:100px;">
            </div>
        <?php endif; ?>

        <label>Rareté :</label>
        <select name="id_rarete">
            <?php
            $raretes = [
                6 => 'Event',
                5 => 'Mythique',
                4 => 'Légendaire',
                3 => 'Épique',
                2 => 'Rare',
                1 => 'Commune'
            ];
            $idR = $carte ? $carte->getRarete()->getId() : 6;
            foreach ($raretes as $id => $lib) {
                $selected = $id === $idR ? 'selected' : '';
                echo "<option value=\"$id\" $selected>$lib</option>";
            }
            ?>
        </select>

        <button type="submit"><?= $carte ? 'Enregistrer les modifications' : 'Ajouter la carte' ?></button>
    </form>
</body>
</html>

