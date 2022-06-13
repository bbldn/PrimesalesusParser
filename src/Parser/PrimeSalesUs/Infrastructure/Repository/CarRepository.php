<?php

namespace App\Parser\PrimeSalesUs\Infrastructure\Repository;

use App\Parser\Common\Domain\Entity\Base\Car;
use App\Parser\Common\Infrastructure\Repository\Base\CarRepository as Base;
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