<?php

namespace App\Parser\Primesalesus\Application\Command;

use BBLDN\CQRS\CommandBus\Command;
use BBLDN\CQRSBundle\CommandBus\Annotation as CQRS;
use App\Parser\Primesalesus\Application\CommandHandler\ParseCarsForSale\Handler;

#[CQRS\CommandHandler(class: Handler::class)]
class ParseCarsForSale implements Command
{
}