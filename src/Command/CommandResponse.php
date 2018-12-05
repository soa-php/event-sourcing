<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Command;

use Soa\EventSourcing\Event\DomainEvent;
use Soa\EventSourcing\Event\EventStream;

class CommandResponse
{
    /**
     * @var EventStream[]
     */
    private $eventStream;

    /**
     * @var array
     */
    private $projection;

    public static function fromDomainEvents(DomainEvent ...$domainEvents)
    {
        return new self(EventStream::fromDomainEvents(...$domainEvents));
    }

    public static function fromEventStream(EventStream $eventStream)
    {
        return new self($eventStream);
    }

    private function __construct(EventStream $eventStream)
    {
        $this->eventStream = $eventStream;
        $this->projection  = [];
    }

    public function eventStream(): EventStream
    {
        return $this->eventStream;
    }

    public function projection(): array
    {
        return $this->projection;
    }

    public function withProjection(array $projection): self
    {
        $clone             = clone $this;
        $clone->projection = $projection;

        return $clone;
    }
}
