<?php

namespace App\Parser\Primesalesus\Application\CommandHandler\ParseCarsForSale\CarSaver\Repository;

use App\Parser\Primesalesus\Domain\Entity\Base\Car;

interface CarRepository
{
    /**
     * @param string $externalId
     * @return Car|null
     */
    public function findOneByExternalId(string $externalId): ?Car;
}