<?php

declare(strict_types=1);

namespace Soa\EventSourcing\Testing;

use PHPUnit\Framework\TestCase;

class CommandHandlerTestCase extends TestCase
{
    /**
     * @var CommandHandlerScenario
     */
    protected $scenario;

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->scenario = new CommandHandlerScenario();

        parent::__construct($name, $data, $dataName);
    }
}
