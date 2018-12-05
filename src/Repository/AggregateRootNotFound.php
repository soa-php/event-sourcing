<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Repository;

use Soa\EventSourcing\Event\DomainEvent;
use Soa\EventSourcing\Event\FailureDomainEvent;

class AggregateRootNotFound implements DomainEvent, FailureDomainEvent
{
    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $repository;

    public function __construct(string $id, string $repository)
    {
        $this->id         = $id;
        $this->repository = $repository;
    }

    public function streamId(): string
    {
        return $this->id;
    }

    public function reason(): string
    {
        return "$this->id not found in repository $this->repository";
    }
}
