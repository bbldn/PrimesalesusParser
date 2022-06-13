<?php

namespace App\Parser\Application\CommandHandler\ParseCarsForSale;

use App\Parser\Application\Command\ParseCarsForSale;
use Doctrine\ORM\EntityManagerInterface as EntityManager;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use App\Parser\Application\CommandHandler\ParseCarsForSale\Client\Client as Client;
use App\Parser\Application\CommandHandler\ParseCarsForSale\CarSaver\Saver as CarSaver;
use App\Parser\Application\CommandHandler\ParseCarsForSale\CarParser\Parser as CarParser;
use App\Parser\Application\CommandHandler\ParseCarsForSale\CategoryParser\Parser as CategoryParser;

class Handler
{
    private Client $client;

    private CarSaver $carSaver;

    private CarParser $carParser;

    private EntityManager $entityManager;

    private CategoryParser $categoryParser;

    /**
     * @param Client $client
     * @param CarSaver $carSaver
     * @param CarParser $carParser
     * @param EntityManager $entityManager
     * @param CategoryParser $categoryParser
     */
    public function __construct(
        Client $client,
        CarSaver $carSaver,
        CarParser $carParser,
        EntityManager $entityManager,
        CategoryParser $categoryParser
    )
    {
        $this->client = $client;
        $this->carSaver = $carSaver;
        $this->carParser = $carParser;
        $this->entityManager = $entityManager;
        $this->categoryParser = $categoryParser;
    }

    /**
     * @param ParseCarsForSale $command
     * @return void
     * @throws ClientExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     * @throws RedirectionExceptionInterface
     */
    public function __invoke(ParseCarsForSale $command): void
    {
        for ($i = 1; ;$i++) {
            $url = "/cars-for-sale?PageNumber=$i&SoldStatus=AllVehicles?Sort=PriceHighest";
            $html = $this->client->get($url);

            $urlList = $this->categoryParser->parse($html)->getUrlList();
            if (0 === count($urlList)) {
                break;
            }

            foreach ($urlList as $url) {
                $html = $this->client->get($url);
                $carDTO = $this->carParser->parse($html);
                if (null !== $carDTO) {
                    $this->carSaver->save($carDTO);
                }
            }

            $this->entityManager->flush();
        }
    }
}