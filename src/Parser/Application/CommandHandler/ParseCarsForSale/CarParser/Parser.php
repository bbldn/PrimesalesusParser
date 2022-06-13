<?php

namespace App\Parser\Application\CommandHandler\ParseCarsForSale\CarParser;

use Symfony\Component\DomCrawler\Crawler;
use App\Parser\Application\CommandHandler\ParseCarsForSale\DTO\Car as CarDTO;

class Parser
{
    /**
     * @param Crawler $crawler
     * @param CarDTO $carDTO
     * @return void
     */
    private function parseName(Crawler $crawler, CarDTO $carDTO): void
    {
        $pathList = [
            "//div[@class='vdp-header-bar__left-column'][1]",
        ];

        $crawler = $crawler->filterXPath(implode('/', $pathList));
        if ($crawler->count() > 0) {
            $name = '';

            $crawler1 = $crawler->filterXPath("//h1[@class='vdp-header-bar__title font-primary'][1]");
            if ($crawler1->count() > 0) {
                $name = trim($crawler1->text());
            }

            $crawler2 = $crawler->filterXPath("//span[@class='vdp-header-bar__subtitle font-primary'][1]");
            if ($crawler2->count() > 0) {
                $name = trim($name . ' ' . $crawler2->text());
            }

            if (mb_strlen($name) > 0) {
                $carDTO->setName($name);
            }
        }
    }

    /**
     * @param Crawler $crawler
     * @param CarDTO $carDTO
     * @return void
     */
    private function parsePrice(Crawler $crawler, CarDTO $carDTO): void
    {
        $pathList = [
            "//div[@class='vdp-header-bar__right-column'][1]",
        ];

        $crawler = $crawler->filterXPath(implode('/', $pathList));
        if ($crawler->count() > 0) {
            $pathList = [
                "//div[@class='vdp-header-bar__price-container'][1]",
                "h3[@class='vdp-header-bar__price font-primary'][1]",
            ];

            $crawlerPrice = $crawler->filterXPath(implode('/', $pathList));
            if ($crawlerPrice->count() > 0) {
                $price = (float)mb_substr(str_replace(',', '', $crawlerPrice->text()), 1);
                $carDTO->setPrice($price);
            }

            $pathList = [
                "//div[@class='vdp-header-bar__mileage-container'][1]",
                "h3[@class='vdp-header-bar__mileage font-primary'][1]",
            ];

            $crawlerMileage = $crawler->filterXPath(implode('/', $pathList));
            if ($crawlerMileage->count() > 0) {
                $mileage = (float)str_replace(',', '', $crawlerMileage->text());
                $carDTO->setMileage($mileage);
            }
        }
    }

    /**
     * @param Crawler $crawler
     * @param CarDTO $carDTO
     * @return void
     */
    private function parseImageList(Crawler $crawler, CarDTO $carDTO): void
    {
        $pathList = [
            "//div[@class='carousel-inner'][1]",
            "div[@class]",
            "img",
        ];

        $result = [];
        $crawler = $crawler->filterXPath(implode('/', $pathList));
        $crawler->each(function (Crawler $c) use(&$result): void {
            $src = trim($c->attr('src'));
            if (mb_strlen($src) > 0) {
                $result[$src] = true;
            }
        });

        $carDTO->setImageList(array_keys($result));
    }

    /**
     * @param Crawler $crawler
     * @param CarDTO $carDTO
     * @return void
     */
    private function parseFeatureList(Crawler $crawler, CarDTO $carDTO): void
    {
        $pathList = [
            "//ul[@class='vehicle-feature-list'][1]",
            "li[@class='vehicle-feature-list__item']",
        ];

        $result = [];
        $crawler = $crawler->filterXPath(implode('/', $pathList));
        $crawler->each(function (Crawler $c) use(&$result): void {
            $text = trim($c->text());
            if (mb_strlen($text) > 0) {
                $result[] = $text;
            }
        });

        $carDTO->setFeatureList($result);
    }

    /**
     * @param Crawler $crawler
     * @param CarDTO $carDTO
     * @return void
     */
    private function parseVehicleInfo(Crawler $crawler, CarDTO $carDTO): void
    {
        $pathList = [
            "//div[@class='vdp-info-block__info-items'][1]",
            "div[@class='vdp-info-block__info-item']",
            "div[@class='vdp-info-block__info-item-text']",
        ];

        $crawler = $crawler->filterXPath(implode('/', $pathList));
        if ($crawler->count() > 0) {
            $crawler->each(function (Crawler $c) use($carDTO): void {
                $c = $c->children();
                if (2 !== $c->count()) {
                    return;
                }

                $crawlerKey = $c->eq(0);
                $crawlerValue = $c->eq(1);

                switch (trim($crawlerKey->text())) {
                    case 'Fuel':
                        $carDTO->setFuel(trim($crawlerValue->text()));
                        break;
                    case 'Engine':
                        $carDTO->setEngine(trim($crawlerValue->text()));
                        break;
                    case 'VIN':
                        $carDTO->setVin(trim($crawlerValue->innerText()));
                        break;
                    case 'Drivetrain':
                        $carDTO->setDrivetrain(trim($crawlerValue->text()));
                        break;
                    case 'Transmission':
                        $carDTO->setTransmission(trim($crawlerValue->text()));
                        break;
                    case 'Exterior Color':
                        $carDTO->setExteriorColor(trim($crawlerValue->text()));
                        break;
                    case 'Interior Color':
                        $carDTO->setInteriorColor(trim($crawlerValue->text()));
                        break;
                    case 'Condition':
                        $carDTO->setNew('Used' !== trim($crawlerValue->text()));
                        break;
                }
            });
        }
    }

    /**
     * @param string $html
     * @return CarDTO|null
     */
    public function parse(string $html): ?CarDTO
    {
        $crawler = new Crawler($html);
        $carDTO = (new CarDTO())->setStatus(true);

        $this->parseName($crawler, $carDTO);
        $this->parsePrice($crawler, $carDTO);
        $this->parseImageList($crawler, $carDTO);
        $this->parseFeatureList($crawler, $carDTO);
        $this->parseVehicleInfo($crawler, $carDTO);

        return $carDTO;
    }
}