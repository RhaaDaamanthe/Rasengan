<?php

namespace App\Database;

use PDO;
use PDOException;

class DBConnexion
{
    private static ?self $instance = null;
    private PDO $pdo;

    private function __construct()
    {
        $host = 'localhost';
        $dbname = 'rasengan';
        $username = 'root';
        $password = '';

        try {
            $this->pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            error_log("Erreur connexion DB : " . $e->getMessage());
            die("Erreur de connexion à la base de données.");
        }
    }

    public static function getOrCreateInstance(): self
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPdo(): PDO
    {
        return $this->pdo;
    }
}
