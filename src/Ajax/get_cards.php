<?php
global $pdo;
require_once '../config/database.php';

$type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING) ?? '';
$rarete = filter_input(INPUT_GET, 'rarete', FILTER_VALIDATE_INT) ?? 0;
$anime = filter_input(INPUT_GET, 'anime', FILTER_SANITIZE_STRING) ?? '';

if (!in_array($type, ['anime', 'film'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Type invalide']);
    exit;
}

$table = $type === 'anime' ? 'cartes_animes' : 'cartes_films';
$field = $type === 'anime' ? 'anime' : 'film';

$query = "SELECT id, nom, $field FROM $table WHERE 1=1";
$params = [];

if (!empty($anime)) {
    $query .= " AND $field = :anime";
    $params['anime'] = $anime;
}
if ($rarete > 0) {
    $query .= " AND id_rarete = :rarete";
    $params['rarete'] = $rarete;
}
$query .= " ORDER BY nom ASC";

try {
    $stmt = $pdo->prepare($query);
    $stmt->execute($params);
    $cartes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($cartes);
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Erreur serveur']);
}
