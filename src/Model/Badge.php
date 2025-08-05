<?php

namespace App\Model;

class Badge
{
    private int $id;
    private string $nom;
    private ?string $description;
    private ?string $imagePath;

    public function __construct(int $id, string $nom, ?string $description = null, ?string $imagePath = null)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->description = $description;
        $this->imagePath = $imagePath;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    public function getImagePath(): ?string
    {
        return $this->imagePath;
    }

    public function setImagePath(?string $imagePath): void
    {
        $this->imagePath = $imagePath;
    }
}
