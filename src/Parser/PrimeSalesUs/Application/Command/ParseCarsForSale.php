<?php

namespace App\Parser\PrimeSalesUs\Application\Command;

use BBLDN\CQRS\CommandBus\Command;
use BBLDN\CQRSBundle\CommandBus\Annotation as CQRS;
use App\Parser\PrimeSalesUs\Application\CommandHandler\ParseCarsForSale\Handler;

#[CQRS\CommandHandler(class: Handler::class)]
class ParseCarsForSale implements Command
{
}