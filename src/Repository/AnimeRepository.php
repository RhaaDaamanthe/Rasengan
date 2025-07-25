<?php

namespace Repository;

use Model\Anime;
use PDO;
require_once __DIR__ . '/../Model/Anime.php';

class AnimeRepository
{
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getAllAnime(): array
    {
        $query = "SELECT * FROM animes ORDER BY id;";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();

        $raretes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $raretes[] = new Anime(
                (int)$row['id'],
                $row['nom']
            );
        }

        return $raretes;
    }

    public function getById(int $id): ?Anime
    {
        $query = "SELECT * FROM animes WHERE id = :id LIMIT 1";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute(['id' => $id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            return new Anime(
                (int)$row['id'],
                $row['nom']
            );
        }

        return null;
    }

    //pour catalogue, permet de compter le nombre de cartes anime
    public function getAnimesWithCardCount(): array
    {
        $query = "
            SELECT a.id, a.nom, COUNT(c.id) AS card_count
            FROM animes a
            LEFT JOIN cartes_animes c ON c.id_anime = a.id
            GROUP BY a.id, a.nom
            ORDER BY a.id;
        ";
    
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
    
        $animes = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $animes[] = [
                'id' => (int)$row['id'],
                'nom' => $row['nom'],
                'card_count' => (int)$row['card_count']
            ];
        }    

        return $animes;
    }

}
