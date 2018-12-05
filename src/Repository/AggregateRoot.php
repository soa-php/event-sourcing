<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Repository;

interface AggregateRoot
{
    public function id(): string;
}
