<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Projection;

use Soa\EventSourcing\Event\DomainEvent;
use Soa\EventSourcing\Event\EventStream;

interface Projector
{
    public function project(DomainEvent $domainEvent, array $projection): array;

    public function projectEventStream(EventStream $eventStream, array $projection): array;
}
