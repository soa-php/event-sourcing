<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Event;

interface FailureDomainEvent
{
    public function reason(): string;
}
