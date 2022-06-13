<?php

namespace App\Parser\Application\CommandHandler\ParseCarsForSale\CategoryParser;

use Symfony\Component\DomCrawler\Crawler;
use App\Parser\Application\CommandHandler\ParseCarsForSale\DTO\Category as CategoryDTO;

class Parser
{
    /**
     * @param string $html
     * @return CategoryDTO
     */
    public function parse(string $html): CategoryDTO
    {
        $crawler = new Crawler($html);
        $pathList = [
            "//html/body",
            "section[@class='inventory-m1 '][1]",
            "div[@class='inventory-m1 data-inventory-module'][1]",
            "div[@class='container inventory-results-container'][1]",
            "div[@class='row'][1]",
            "div[@class='col-md-12'][1]",
            "form[1]",
            "div[@class='row gutter-small'][1]",
            "div[@class='col-md-9'][1]",
            "div[@class='data-result-table'][1]",
            "ul[@class='list-unstyled list-inline vehicle-section'][1]",
            "li[@class='vehicle-snapshot']",
            "div[@class='vehicle-snapshot__inventory-details'][1]",
            "div[@class='row gutter-small'][1]",
            "div[@class='col-lg-7-of-10 col-sm-7 col-xs-12'][1]",
            "div[@class='vehicle-snapshot__information'][1]",
            "div[@class='row'][1]",
            "div[@class='col-xs-12 col-sm-7 col-md-6'][1]",
            "h3[@class='vehicle-snapshot__title'][1]",
            "a[1],"
        ];

        $urlList = [];
        $crawler->filterXPath(implode('/', $pathList))->each(function (Crawler $c) use(&$urlList): void {
            $href = trim($c->attr('href'));
            if (mb_strlen($href) > 0) {
                $urlList[] = $href;
            }
        });

        return new CategoryDTO($urlList);
    }
}