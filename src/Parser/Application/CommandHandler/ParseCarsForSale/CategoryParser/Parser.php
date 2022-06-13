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

        $urlList = [];
        $crawler = $crawler->filterXPath("//h3[@class='vehicle-snapshot__title']/a[1]");
        $crawler->each(function (Crawler $c) use(&$urlList): void {
            $href = trim((string)$c->attr('href'));
            if (mb_strlen($href) > 0) {
                $urlList[] = $href;
            }
        });

        return new CategoryDTO($urlList);
    }
}