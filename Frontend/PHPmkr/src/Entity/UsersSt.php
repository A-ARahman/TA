<?php

namespace PHPMaker2024\project1\Entity;

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
use PHPMaker2024\project1\AbstractEntity;
use PHPMaker2024\project1\AdvancedSecurity;
use PHPMaker2024\project1\UserProfile;
use function PHPMaker2024\project1\Config;
use function PHPMaker2024\project1\EntityManager;
use function PHPMaker2024\project1\RemoveXss;
use function PHPMaker2024\project1\HtmlDecode;
use function PHPMaker2024\project1\EncryptPassword;

/**
 * Entity class for "users_st" table
 */
#[Entity]
#[Table(name: "users_st")]
class UsersSt extends AbstractEntity
{
    #[Id]
    #[Column(name: "user_id", type: "bigint", unique: true)]
    #[GeneratedValue]
    private string $userId;

    #[Column(type: "string")]
    private string $name;

    #[Column(type: "string", nullable: true)]
    private ?string $sports;

    #[Column(name: "weight_kg", type: "decimal", nullable: true)]
    private ?string $weightKg;

    #[Column(name: "height_cm", type: "decimal", nullable: true)]
    private ?string $heightCm;

    #[Column(type: "string", nullable: true)]
    private ?string $sex;

    public function getUserId(): string
    {
        return $this->userId;
    }

    public function setUserId(string $value): static
    {
        $this->userId = $value;
        return $this;
    }

    public function getName(): string
    {
        return HtmlDecode($this->name);
    }

    public function setName(string $value): static
    {
        $this->name = RemoveXss($value);
        return $this;
    }

    public function getSports(): ?string
    {
        return HtmlDecode($this->sports);
    }

    public function setSports(?string $value): static
    {
        $this->sports = RemoveXss($value);
        return $this;
    }

    public function getWeightKg(): ?string
    {
        return $this->weightKg;
    }

    public function setWeightKg(?string $value): static
    {
        $this->weightKg = $value;
        return $this;
    }

    public function getHeightCm(): ?string
    {
        return $this->heightCm;
    }

    public function setHeightCm(?string $value): static
    {
        $this->heightCm = $value;
        return $this;
    }

    public function getSex(): ?string
    {
        return HtmlDecode($this->sex);
    }

    public function setSex(?string $value): static
    {
        $this->sex = RemoveXss($value);
        return $this;
    }
}
