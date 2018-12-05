<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Testing;

use Soa\EventSourcing\Command\Command;
use Soa\EventSourcing\Command\CommandHandler;
use Soa\EventSourcing\Event\DomainEvent;
use Soa\EventSourcing\Event\EventStream;
use Soa\EventSourcing\Projection\Projector;
use Soa\EventSourcing\Repository\AggregateRoot;
use PHPUnit\Framework\Assert as PHPUnitAssert;

class CommandHandlerScenario
{
    /**
     * @var EventStream
     */
    private $eventStream;

    /**
     * @var AggregateRoot
     */
    private $aggregateRoot;

    /**
     * @var CommandHandler
     */
    private $commandHandler;

    /**
     * @var Projector
     */
    private $projector;

    public function withCommandHandler(CommandHandler $commandHandler): self
    {
        $this->commandHandler = $commandHandler;

        return $this;
    }

    public function withProjector(Projector $projector): self
    {
        $this->projector = $projector;

        return $this;
    }

    public function given(AggregateRoot $aggregateRoot): self
    {
        $this->aggregateRoot = $aggregateRoot;

        return $this;
    }

    public function when(Command $command): self
    {
        $this->eventStream = $this->commandHandler->handle($command, $this->aggregateRoot);

        return $this;
    }

    public function then(DomainEvent ...$domainEvents): self
    {
        PHPUnitAssert::assertEquals(EventStream::fromDomainEvents(...$domainEvents), $this->eventStream);

        return $this;
    }

    public function andProjection(array $expectedProjection): self
    {
        PHPUnitAssert::assertEquals($expectedProjection, $this->projector->projectEventStream($this->eventStream, []));

        return $this;
    }
}
