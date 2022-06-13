<?php

namespace App\Parser\Application\CommandHandler\ParseCarsForSale\CarSaver;

use App\Parser\Domain\Entity\Base\Car;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use App\Parser\Application\CommandHandler\ParseCarsForSale\DTO\Car as CarDTO;
use App\Parser\Application\CommandHandler\ParseCarsForSale\CarSaver\Repository\CarRepository;

class Saver
{
    private CarRepository $carRepository;

    private EntityManager $entityManager;

    /**
     * @param CarRepository $carRepository
     * @param EntityManager $entityManager
     */
    public function __construct(
        CarRepository $carRepository,
        EntityManager $entityManager
    )
    {
        $this->carRepository = $carRepository;
        $this->entityManager = $entityManager;
    }

    /**
     * @param CarDTO $carDTO
     * @return Car|null
     */
    public function save(CarDTO $carDTO): ?Car
    {
        $externalId = (string)$carDTO->getExternalId();
        if (0 === mb_strlen($externalId)) {
            return null;
        }

        $car = $this->carRepository->findOneByExternalId($externalId);
        if (null === $car) {
            $car = new Car();
            $car->setExternalId($externalId);
        }

        $car->setNew($carDTO->getNew());
        $car->setVin($carDTO->getVin());
        $car->setFuel($carDTO->getFuel());
        $car->setName($carDTO->getName());
        $car->setPrice($carDTO->getPrice());
        $car->setEngine($carDTO->getEngine());
        $car->setStatus($carDTO->getStatus());
        $car->setMileage($carDTO->getMileage());
        $car->setDrivetrain($carDTO->getDrivetrain());
        $car->setTransmission($carDTO->getTransmission());
        $car->setExteriorColor($carDTO->getExteriorColor());
        $car->setInteriorColor($carDTO->getInteriorColor());

        $this->entityManager->persist($car);

        return $car;
    }
}