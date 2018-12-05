<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Command;

use Soa\EventSourcing\Event\EventStream;
use Soa\EventSourcing\Repository\AggregateRoot;

interface CommandHandler
{
    public function handle(Command $command, AggregateRoot $aggregateRoot): EventStream;
}
