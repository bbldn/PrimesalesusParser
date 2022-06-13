<?php

namespace App\Parser\PrimeSalesUs\Infrastructure\Repository;

use App\Parser\PrimeSalesUs\Domain\Entity\Base\Car;
use App\Parser\PrimeSalesUs\Infrastructure\Repository\Base\CarRepository as Base;
use App\Parser\PrimeSalesUs\Application\CommandHandler\ParseCarsForSale\CarSaver\Repository\CarRepository as CarRepositoryParseCarsForSale;

class CarRepository extends Base implements CarRepositoryParseCarsForSale
{
    /**
     * @param string $externalId
     * @return Car|null
     */
    public function findOneByExternalId(string $externalId): ?Car
    {
        return $this->findOneBy(['externalId' => $externalId]);
    }
}