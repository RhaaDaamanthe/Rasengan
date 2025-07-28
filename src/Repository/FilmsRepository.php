<?php

namespace App\Repository;
require_once __DIR__ . '/../Model/Film.php';

use App\Model\Film;
use PDO;

class FilmsRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAllFilm(): array
    {
        $query = "SELECT * FROM films ORDER BY id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $raretes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $raretes[] = new Film(
                (int)$row['id'],
                $row['nom']
            );
        }

        return $raretes;
    }

    public function getById(int $id): ?Film
    {
        $query = "SELECT * FROM films WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Film(
                (int)$row['id'],
                $row['nom']
            );
        }

        return null;
    }

    //permet de compter le nombre de carte film, utilisé dans catalogue
    public function getFilmsWithCardCount(): array
    {
        $query = "
            SELECT f.id, f.nom, COUNT(c.id) AS card_count
            FROM films f
            LEFT JOIN cartes_films c ON c.id_film = f.id
            GROUP BY f.id, f.nom
            ORDER BY f.id;
        ";
    
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    
        $films = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $films[] = [
                'id' => (int)$row['id'],
                'nom' => $row['nom'],
                'card_count' => (int)$row['card_count']
            ];
        }
    
        return $films;
    }
}
