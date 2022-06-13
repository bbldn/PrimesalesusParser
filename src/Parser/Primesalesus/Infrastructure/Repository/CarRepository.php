<?php

namespace App\Parser\Primesalesus\Infrastructure\Repository;

use App\Parser\Primesalesus\Domain\Entity\Base\Car;
use App\Parser\Primesalesus\Infrastructure\Repository\Base\CarRepository as Base;
use App\Parser\Primesalesus\Application\CommandHandler\ParseCarsForSale\CarSaver\Repository\CarRepository as CarRepositoryParseCarsForSale;

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