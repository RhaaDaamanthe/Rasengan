<?php

namespace App\Model;

use App\Model\Film;
use App\Model\Rarete;

class CarteFilm
{
    private int $id;
    private string $nom;
    private Film $film;
    private Rarete $rarete;
    private string $imagePath;
    private ?string $description;
    private ?string $proprietaire;
    private int $quantiteActuelle;
    
    //carte film /catalogue
    private ?string $infoSup = null;
    private array $owners = [];

    /**
     * @param int $id
     * @param string $nom
     * @param Film $film
     * @param Rarete $rarete
     * @param string $imagePath
     * @param string|null $description
     * @param string|null $proprietaire
     * @param int $quantiteActuelle
     */
    public function __construct(int $id, string $nom, Film $film, Rarete $rarete, string $imagePath, ?string $description, ?string $proprietaire, int $quantiteActuelle)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->film = $film;
        $this->rarete = $rarete;
        $this->imagePath = $imagePath;
        $this->description = $description;
        $this->proprietaire = $proprietaire;
        $this->quantiteActuelle = $quantiteActuelle;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNom(): string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getFilm(): Film
    {
        return $this->film;
    }

    public function setFilm(Film $film): void
    {
        $this->film = $film;
    }

    public function getRarete(): Rarete
    {
        return $this->rarete;
    }

    public function setRarete(Rarete $rarete): void
    {
        $this->rarete = $rarete;
    }

    public function getImagePath(): string
    {
        return $this->imagePath;
    }

    public function setImagePath(string $imagePath): void
    {
        $this->imagePath = $imagePath;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getProprietaire(): ?string
    {
        return $this->proprietaire;
    }

    public function setProprietaire(?string $proprietaire): void
    {
        $this->proprietaire = $proprietaire;
    }

    public function getQuantiteActuelle(): int
    {
        return $this->quantiteActuelle;
    }

    public function setQuantiteActuelle(int $quantiteActuelle): void
    {
        $this->quantiteActuelle = $quantiteActuelle;
    }

    public function setInfoSup(string $infoSup): void 
    {
        $this->infoSup = $infoSup;
    }

    public function getInfoSup(): ?string 
    {
        return $this->infoSup;
    }

    public function setOwners(array $owners): void 
    {
        $this->owners = $owners;
    }

    public function getOwners(): array 
    {
        return $this->owners;
    }


}