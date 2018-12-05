<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Command;

abstract class ConventionBasedCommand implements Command
{
    /**
     * @var string
     */
    protected $aggregateRootId = '';

    public function aggregateRootId(): string
    {
        return $this->aggregateRootId;
    }

    public function withAggregateRootId(string $id): Command
    {
        $clone                  = clone $this;
        $clone->aggregateRootId = $id;

        return $clone;
    }
}
