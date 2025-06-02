<?php

global $pdo;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action']) && in_array($_POST['action'], ['give', 'remove'])) {

        $user_id = filter_input(INPUT_POST, 'userId', FILTER_VALIDATE_INT) ?? 0;
        $card_id = filter_input(INPUT_POST, 'cardId', FILTER_VALIDATE_INT) ?? 0;
        $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT) ?? 1;
        $card_type = filter_input(INPUT_POST, 'cardType', FILTER_SANITIZE_STRING) ?? '';
        $action = $_POST['action'];

        if ($user_id <= 0 || $card_id <= 0 || $quantity <= 0 || !in_array($card_type, ['anime', 'film'])) {
            $_SESSION['message'] = "<p style='color:red;'>Erreur : Données invalides.</p>";
            header("Location: test.php");
            exit;
        }

        $table = $card_type === 'anime' ? 'utilisateurs_cartes_animes' : 'utilisateurs_cartes_films';
        $carte_table = $card_type === 'anime' ? 'cartes_animes' : 'cartes_films';

        // Vérifier rareté et limite
        $stmt = $pdo->prepare("
            SELECT ca.id_rarete, r.quantite AS quantite_max
            FROM $carte_table ca
            JOIN raretes r ON ca.id_rarete = r.id_rarete
            WHERE ca.id = :card_id
        ");
        $stmt->execute(['card_id' => $card_id]);
        $card_data = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$card_data) {
            $_SESSION['message'] = "<p style='color:red;'>Erreur : Carte non trouvée.</p>";
            header("Location: test.php");
            exit;
        }

        $quantite_max = (int)$card_data['quantite_max'];

        $stmt = $pdo->prepare("SELECT COALESCE(SUM(quantite), 0) AS total FROM $table WHERE carte_id = :card_id");
        $stmt->execute(['card_id' => $card_id]);
        $quantite_attribuee = (int)$stmt->fetchColumn();
        $quantite_restante = $quantite_max - $quantite_attribuee;

        // Quantité actuelle du joueur
        $stmt = $pdo->prepare("SELECT quantite FROM $table WHERE user_id = :user_id AND carte_id = :card_id");
        $stmt->execute(['user_id' => $user_id, 'card_id' => $card_id]);
        $current_quantity = (int)($stmt->fetchColumn() ?? 0);

        if ($action === 'give') {
            if ($quantity > $quantite_restante) {
                $_SESSION['message'] = "<p style='color:red;'>Erreur : Pas assez de cartes disponibles (restant : $quantite_restante).</p>";
                header("Location: test.php");
                exit;
            }

            if ($current_quantity > 0) {
                $stmt = $pdo->prepare("UPDATE $table SET quantite = quantite + :quantity WHERE user_id = :user_id AND carte_id = :card_id");
            } else {
                $stmt = $pdo->prepare("INSERT INTO $table (user_id, carte_id, quantite) VALUES (:user_id, :card_id, :quantity)");
            }

            $stmt->execute(['user_id' => $user_id, 'card_id' => $card_id, 'quantity' => $quantity]);
            $_SESSION['message'] = "<p style='color:green;'>Carte donnée avec succès !</p>";
        }

        if ($action === 'remove') {
            if ($current_quantity < $quantity) {
                $_SESSION['message'] = "<p style='color:red;'>Erreur : Le joueur n'a pas assez de cartes.</p>";
                header("Location: test.php");
                exit;
            }

            $new_quantity = $current_quantity - $quantity;
            if ($new_quantity > 0) {
                $stmt = $pdo->prepare("UPDATE $table SET quantite = :new_quantity WHERE user_id = :user_id AND carte_id = :card_id");
                $stmt->execute(['user_id' => $user_id, 'card_id' => $card_id, 'new_quantity' => $new_quantity]);
            } else {
                $stmt = $pdo->prepare("DELETE FROM $table WHERE user_id = :user_id AND carte_id = :card_id");
                $stmt->execute(['user_id' => $user_id, 'card_id' => $card_id]);
            }

            $_SESSION['message'] = "<p style='color:green;'>Carte enlevée avec succès !</p>";
        }

        header("Location: test.php");
        exit;
    }
}
