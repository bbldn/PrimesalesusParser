<?php

namespace App\Parser\PrimeSalesUs\Application\CommandHandler\ParseCarsForSale\CarSaver\Repository;

use App\Parser\Common\Domain\Entity\Base\Car;

interface CarRepository
{
    /**
     * @param string $externalId
     * @return Car|null
     */
    public function findOneByExternalId(string $externalId): ?Car;
}