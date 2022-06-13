<?php

namespace App\Parser\PrimeSalesUs\Infrastructure\Repository\Base;

use Throwable;
use Psr\Log\LoggerInterface as Logger;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @template T
 */
abstract class Repository extends ServiceEntityRepository
{
    protected Logger $logger;

    /**
     * @param Logger $logger
     * @param ManagerRegistry $registry
     * @param string $entityClass
     *
     * @psalm-param class-string<T> $entityClass
     */
    public function __construct(Logger $logger, ManagerRegistry $registry, string $entityClass)
    {
        parent::__construct($registry, $entityClass);
        $this->logger = $logger;
    }

    /**
     * @param mixed $instance
     * @return void
     *
     * @psalm-param T $instance
     */
    public function remove(mixed $instance): void
    {
        try {
            $this->_em->remove($instance);
        } catch (Throwable $e) {
            $this->logger->error((string)$e);
        }
    }

    /**
     * @return void
     */
    public function flush(): void
    {
        try {
            $this->_em->flush();
        } catch (Throwable $e) {
            $this->logger->error((string)$e);
        }
    }
}