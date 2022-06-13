<?php

namespace App\Parser\Primesalesus\Application\CommandHandler\ParseCarsForSale\DTO;

class Car
{
    private ?bool $new = null;

    private ?bool $status = null;

    private ?string $fuel = null;

    private ?string $name = null;

    private ?float $price = null;

    private ?string $vin = null;

    private ?string $engine = null;

    private ?float $mileage = null;

    private ?string $drivetrain = null;

    private ?string $transmission = null;

    private ?string $exteriorColor = null;

    private ?string $interiorColor = null;

    private ?string $externalId = null;

    /**
     * @var string[]|null
     *
     * @psalm-var list<string>|null
     */
    private ?array $imageList = null;

    /**
     * @var string[]|null
     *
     * @psalm-var list<string>|null
     */
    private ?array $featureList = null;

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
     *
     * @psalm-return list<string>|null
     */
    public function getImageList(): ?array
    {
        return $this->imageList;
    }

    /**
     * @param string[]|null $imageList
     * @return Car
     *
     * @psalm-param list<string>|null $imageList
     */
    public function setImageList(?array $imageList): self
    {
        $this->imageList = $imageList;

        return $this;
    }

    /**
     * @return string[]|null
     *
     * @psalm-return list<string>|null
     */
    public function getFeatureList(): ?array
    {
        return $this->featureList;
    }

    /**
     * @param string[]|null $featureList
     * @return Car
     *
     * @psalm-param list<string>|null $featureList
     */
    public function setFeatureList(?array $featureList): self
    {
        $this->featureList = $featureList;

        return $this;
    }
}