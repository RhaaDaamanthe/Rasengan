<?php

namespace App\Model;

class Utilisateur
{
    private int $id;
    private string $pseudo;
    private string $email;
    private bool $isAdmin;

    /**
     * @param int $id
     * @param string $pseudo
     * @param string $email
     * @param bool $isAdmin
     */
    public function __construct(int $id, string $pseudo, string $email, bool $isAdmin)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->email = $email;
        $this->isAdmin = $isAdmin;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getPseudo(): string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): void
    {
        $this->pseudo = $pseudo;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function isAdmin(): bool
    {
        return $this->isAdmin;
    }

    public function setIsAdmin(bool $isAdmin): void
    {
        $this->isAdmin = $isAdmin;
    }

}
