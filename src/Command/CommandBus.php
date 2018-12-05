<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Command;

interface CommandBus
{
    public function handle(Command $command): CommandResponse;
}
