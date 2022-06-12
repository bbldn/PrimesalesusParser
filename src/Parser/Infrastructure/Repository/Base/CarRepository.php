<?php

namespace App\Parser\Infrastructure\Repository\Base;

use Psr\Log\LoggerInterface as Logger;
use App\Parser\Domain\Entity\Base\Car;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Car[]    findAll()
 * @method Car|null find($id, $lockMode = null, $lockVersion = null)
 * @method Car|null findOneBy(array $criteria, array $orderBy = null)
 * @method Car[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @psalm-method list<Car>   findAll()
 * @psalm-method list<Car>   findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 *
 * @template-extends Repository<Car>
 */
class CarRepository extends Repository
{
    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     */
    public function __construct(Logger $logger, ManagerRegistry $registry)
    {
        parent::__construct($logger, $registry, Car::class);
    }
}