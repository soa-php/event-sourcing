<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Command;

interface Command
{
    public function aggregateRootId(): string;

    public function withAggregateRootId(string $id): self;
}
