<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Repository;

interface Repository
{
    public function findOfId(string $id): ?AggregateRoot;
}
