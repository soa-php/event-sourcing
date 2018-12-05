<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Projection;

interface ProjectionTable
{
    public function findOfId(string $id): array;

    public function save(string $id, array $projection): void;
}
