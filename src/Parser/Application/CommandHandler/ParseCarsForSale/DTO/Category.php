<?php

namespace App\Parser\Application\CommandHandler\ParseCarsForSale\DTO;

class Category
{
    /**
     * @var string[]
     *
     * @psalm-var list<string>
     */
    private array $carUrlList;

    /**
     * @param string[] $carUrlList
     *
     * @psalm-param list<string> $carUrlList
     */
    public function __construct(array $carUrlList)
    {
        $this->carUrlList = $carUrlList;
    }

    /**
     * @return string[]
     *
     * @psalm-return list<string>
     */
    public function getCarUrlList(): array
    {
        return $this->carUrlList;
    }
}