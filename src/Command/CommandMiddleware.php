<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Command;

interface CommandMiddleware
{
    public function __invoke(Command $command, callable $nextMiddleware): CommandResponse;
}
