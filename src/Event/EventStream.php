<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Event;

class EventStream implements \Countable
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var DomainEvent
     */
    private $domainEvents;

    public static function fromDomainEvents(DomainEvent ...$domainEvents): self
    {
        return new self(...$domainEvents);
    }

    private function __construct(DomainEvent ...$domainEvents)
    {
        $this->domainEvents = $domainEvents;
        $this->id           = $this->extractStreamId(...$domainEvents);
    }

    private function extractStreamId(DomainEvent ...$domainEvents): string
    {
        return (string) array_reduce(
            $domainEvents,
            function (string $previousId, DomainEvent $domainEvent) {
                if ($previousId !== $domainEvent->streamId()) {
                    throw new \InvalidArgumentException('All events in a stream must have the same stream id');
                }

                return $previousId;
            },
            array_pop($domainEvents)->streamId()
        );
    }

    public function id(): string
    {
        return $this->id;
    }

    public function count(): int
    {
        return count($this->domainEvents);
    }

    public function first(): DomainEvent
    {
        return $this->domainEvents[0];
    }

    /**
     * @return DomainEvent[]
     */
    public function domainEvents(): array
    {
        return $this->domainEvents;
    }
}
