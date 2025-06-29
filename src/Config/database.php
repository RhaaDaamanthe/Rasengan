<?php
$host = 'localhost';
$dbname = 'rasengan';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    error_log("Erreur connexion DB : " . $e->getMessage());
    die("Erreur de connexion à la base de données.");
}
