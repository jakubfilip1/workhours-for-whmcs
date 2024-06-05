<?php

namespace WorkHours\Tests\Actions;

use PHPUnit\Framework\TestCase;
use WorkHours\Actions\Config;

class ConfigTest extends TestCase
{
    public function testExecute()
    {
        $configAction = new Config();
        $result = $configAction->execute();

        $this->assertIsArray($result);
    }
}