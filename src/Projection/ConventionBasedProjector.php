<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Projection;

use Soa\EventSourcing\Event\DomainEvent;
use Soa\EventSourcing\Event\EventStream;

class ConventionBasedProjector implements Projector
{
    public function projectEventStream(EventStream $eventStream, array $projection): array
    {
        foreach ($eventStream->domainEvents() as $event) {
            $projection = $this->project($event, $projection);
        }

        return $projection;
    }

    public function project(DomainEvent $domainEvent, array $projection): array
    {
        $callMethod = $this->callMethod($domainEvent);

        return $this->$callMethod($domainEvent, $projection);
    }

    private function callMethod(DomainEvent $domainEvent)
    {
        $fqcnParts = explode('\\', get_class($domainEvent));

        return 'project' . end($fqcnParts);
    }
}
