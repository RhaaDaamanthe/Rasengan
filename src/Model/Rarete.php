<?php

namespace Model;

class Rarete
{
    private int $id;
    private string $libelle;
    private int $quantiteMax;

    /**
     * @param int $id
     * @param int $quantiteMax
     * @param string $libelle
     */
    public function __construct(int $id, int $quantiteMax, string $libelle)
    {
        $this->id = $id;
        $this->quantiteMax = $quantiteMax;
        $this->libelle = $libelle;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): void
    {
        $this->libelle = $libelle;
    }

    public function getQuantiteMax(): int
    {
        return $this->quantiteMax;
    }

    public function setQuantiteMax(int $quantiteMax): void
    {
        $this->quantiteMax = $quantiteMax;
    }


}