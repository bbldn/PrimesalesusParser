<?php

namespace App\Parser\PrimeSalesUs\Application\CommandHandler\ParseCarsForSale\CarSaver\Repository;

use App\Parser\PrimeSalesUs\Domain\Entity\Base\Car;

interface CarRepository
{
    /**
     * @param string $externalId
     * @return Car|null
     */
    public function findOneByExternalId(string $externalId): ?Car;
}