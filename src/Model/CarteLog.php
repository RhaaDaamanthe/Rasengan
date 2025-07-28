<?php

namespace App\Model;

class CarteLog
{
    private int $id;
    private int $userId;
    private int $carteId;
    private string $type;
    private string $action;
    private string $dateAction;

    /**
     * @param int $id
     * @param int $userId
     * @param int $carteId
     * @param string $type
     * @param string $action
     * @param string $dateAction
     */
    public function __construct(
        int $id,
        int $userId,
        int $carteId,
        string $type,
        string $action,
        string $dateAction
    ) {
        $this->id = $id;
        $this->userId = $userId;
        $this->carteId = $carteId;
        $this->type = $type;
        $this->action = $action;
        $this->dateAction = $dateAction;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUserId(): int
    {
        return $this->userId;
    }

    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    public function getCarteId(): int
    {
        return $this->carteId;
    }

    public function setCarteId(int $carteId): void
    {
        $this->carteId = $carteId;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function setType(string $type): void
    {
        $this->type = $type;
    }

    public function getAction(): string
    {
        return $this->action;
    }

    public function setAction(string $action): void
    {
        $this->action = $action;
    }

    public function getDateAction(): string
    {
        return $this->dateAction;
    }

    public function setDateAction(string $dateAction): void
    {
        $this->dateAction = $dateAction;
    }
}
