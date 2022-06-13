<?php

namespace App\Parser\Application\CommandHandler\ParseCarsForSale\CarSaver\Repository;

use App\Parser\Domain\Entity\Base\Car;

interface CarRepository
{
    /**
     * @param string $externalId
     * @return Car|null
     */
    public function findOneByExternalId(string $externalId): ?Car;
}