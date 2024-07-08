<?php

namespace PHPMaker2024\project3\Entity;

use DateTime;
use DateTimeImmutable;
use DateInterval;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\SequenceGenerator;
use Doctrine\DBAL\Types\Types;
use PHPMaker2024\project3\AbstractEntity;
use PHPMaker2024\project3\AdvancedSecurity;
use PHPMaker2024\project3\UserProfile;
use function PHPMaker2024\project3\Config;
use function PHPMaker2024\project3\EntityManager;
use function PHPMaker2024\project3\RemoveXss;
use function PHPMaker2024\project3\HtmlDecode;
use function PHPMaker2024\project3\EncryptPassword;

/**
 * Entity class for "data_st" table
 */
#[Entity]
#[Table(name: "data_st")]
class DataSt extends AbstractEntity
{
    #[Id]
    #[Column(name: "data_id", type: "bigint", unique: true)]
    #[GeneratedValue]
    private string $dataId;

    #[Column(name: "user_id", type: "bigint")]
    private string $userId;

    #[Column(type: "decimal", nullable: true)]
    private ?string $power;

    #[Column(name: "highest_load", type: "decimal", nullable: true)]
    private ?string $highestLoad;

    #[Column(name: "highest_speed", type: "decimal", nullable: true)]
    private ?string $highestSpeed;

    #[Column(type: "datetime")]
    private DateTime $timestamp;

    public function getDataId(): string
    {
        return $this->dataId;
    }

    public function setDataId(string $value): static
    {
        $this->dataId = $value;
        return $this;
    }

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function setUserId(string $value): static
    {
        $this->userId = $value;
        return $this;
    }

    public function getPower(): ?string
    {
        return $this->power;
    }

    public function setPower(?string $value): static
    {
        $this->power = $value;
        return $this;
    }

    public function getHighestLoad(): ?string
    {
        return $this->highestLoad;
    }

    public function setHighestLoad(?string $value): static
    {
        $this->highestLoad = $value;
        return $this;
    }

    public function getHighestSpeed(): ?string
    {
        return $this->highestSpeed;
    }

    public function setHighestSpeed(?string $value): static
    {
        $this->highestSpeed = $value;
        return $this;
    }

    public function getTimestamp(): DateTime
    {
        return $this->timestamp;
    }

    public function setTimestamp(DateTime $value): static
    {
        $this->timestamp = $value;
        return $this;
    }
}
