<?php

namespace App\Parser\Common\Domain\Entity\Base;

use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use App\Parser\Common\Infrastructure\Repository\Base\CarRepository;

#[ORM\Table(name: "`cars`")]
#[ORM\Index(name: 'external_id_idx', columns: ['external_id'])]
#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    /* Идентификатор */
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(name: "`id`", type: Types::INTEGER, options: ["unsigned" => true])]
    private ?int $id = null;

    /* 0 - Б/У, 1 - новый */
    #[ORM\Column(name: "`new`", type: Types::BOOLEAN, options: ["default" => 1])]
    private ?bool $new = null;

    /* 0 - продана, 1 - продает */
    #[ORM\Column(name: "`status`", type: Types::BOOLEAN, options: ["default" => 1])]
    private ?bool $status = null;

    /* Топливо */
    #[ORM\Column(name: "`fuel`", type: Types::STRING, length: 50, nullable: true)]
    private ?string $fuel = null;

    /* Название */
    #[ORM\Column(name: "`name`", type: Types::STRING, length: 512, nullable: true)]
    private ?string $name = null;

    /* Цена */
    #[ORM\Column(name: "`price`", type: Types::FLOAT, nullable: true, options: ["unsigned" => true])]
    private ?float $price = null;

    /* VIN */
    #[ORM\Column(name: "`vin`", type: Types::STRING, length: 17, nullable: true)]
    private ?string $vin = null;

    /* Мотор */
    #[ORM\Column(name: "`engine`", type: Types::STRING, length: 50, nullable: true)]
    private ?string $engine = null;

    /* Пробег */
    #[ORM\Column(name: "`mileage`", type: Types::FLOAT, nullable: true, options: ["unsigned" => true])]
    private ?float $mileage = null;

    /* Привод */
    #[ORM\Column(name: "`drivetrain`", type: Types::STRING, length: 50, nullable: true)]
    private ?string $drivetrain = null;

    /* Трансмиссия */
    #[ORM\Column(name: "`transmission`", type: Types::STRING, length: 50, nullable: true)]
    private ?string $transmission = null;

    /* Цвет салона */
    #[ORM\Column(name: "`interior_color`", type: Types::STRING, length: 50, nullable: true)]
    private ?string $interiorColor = null;

    /* Цвет машины */
    #[ORM\Column(name: "`exterior_color`", type: Types::STRING, length: 50, nullable: true)]
    private ?string $exteriorColor = null;

    /* Внешний идентификатор */
    #[ORM\Column(name: "`external_id`", type: Types::STRING, length: 50, nullable: true)]
    private ?string $externalId = null;

    /**
     * Атрибуты
     *
     * @var string[]|null
     *
     * @psalm-var list<string>|null
     */
    #[ORM\Column(name: "`features`", type: Types::JSON, nullable: true)]
    private ?array $features = null;

    /**
     * Картинки
     *
     * @var string[]|null
     *
     * @psalm-var list<string>|null
     */
    #[ORM\Column(name: "`pictures`", type: Types::JSON, nullable: true)]
    private ?array $pictures = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     * @return Car
     */
    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getNew(): ?bool
    {
        return $this->new;
    }

    /**
     * @param bool|null $new
     * @return Car
     */
    public function setNew(?bool $new): self
    {
        $this->new = $new;

        return $this;
    }

    /**
     * @return bool|null
     */
    public function getStatus(): ?bool
    {
        return $this->status;
    }

    /**
     * @param bool|null $status
     * @return Car
     */
    public function setStatus(?bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getFuel(): ?string
    {
        return $this->fuel;
    }

    /**
     * @param string|null $fuel
     * @return Car
     */
    public function setFuel(?string $fuel): self
    {
        $this->fuel = $fuel;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     * @return Car
     */
    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getPrice(): ?float
    {
        return $this->price;
    }

    /**
     * @param float|null $price
     * @return Car
     */
    public function setPrice(?float $price): self
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getVin(): ?string
    {
        return $this->vin;
    }

    /**
     * @param string|null $vin
     * @return Car
     */
    public function setVin(?string $vin): self
    {
        $this->vin = $vin;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getEngine(): ?string
    {
        return $this->engine;
    }

    /**
     * @param string|null $engine
     * @return Car
     */
    public function setEngine(?string $engine): self
    {
        $this->engine = $engine;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getMileage(): ?float
    {
        return $this->mileage;
    }

    /**
     * @param float|null $mileage
     * @return Car
     */
    public function setMileage(?float $mileage): self
    {
        $this->mileage = $mileage;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDrivetrain(): ?string
    {
        return $this->drivetrain;
    }

    /**
     * @param string|null $drivetrain
     * @return Car
     */
    public function setDrivetrain(?string $drivetrain): self
    {
        $this->drivetrain = $drivetrain;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getTransmission(): ?string
    {
        return $this->transmission;
    }

    /**
     * @param string|null $transmission
     * @return Car
     */
    public function setTransmission(?string $transmission): self
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getInteriorColor(): ?string
    {
        return $this->interiorColor;
    }

    /**
     * @param string|null $interiorColor
     * @return Car
     */
    public function setInteriorColor(?string $interiorColor): self
    {
        $this->interiorColor = $interiorColor;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExteriorColor(): ?string
    {
        return $this->exteriorColor;
    }

    /**
     * @param string|null $exteriorColor
     * @return Car
     */
    public function setExteriorColor(?string $exteriorColor): self
    {
        $this->exteriorColor = $exteriorColor;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getExternalId(): ?string
    {
        return $this->externalId;
    }

    /**
     * @param string|null $externalId
     * @return Car
     */
    public function setExternalId(?string $externalId): self
    {
        $this->externalId = $externalId;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getFeatures(): ?array
    {
        return $this->features;
    }

    /**
     * @param string[]|null $features
     * @return Car
     */
    public function setFeatures(?array $features): self
    {
        $this->features = $features;

        return $this;
    }

    /**
     * @return string[]|null
     */
    public function getPictures(): ?array
    {
        return $this->pictures;
    }

    /**
     * @param string[]|null $pictures
     * @return Car
     */
    public function setPictures(?array $pictures): self
    {
        $this->pictures = $pictures;

        return $this;
    }
}