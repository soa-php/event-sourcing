<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Event;

interface DomainEvent
{
    public function streamId(): string;
}
