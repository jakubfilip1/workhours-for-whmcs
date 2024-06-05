<?php

namespace WorkHours\Tests\Actions;

use PHPUnit\Framework\TestCase;
use WorkHours\Actions\Sidebar;

class SidebarTest extends TestCase
{
    public function testExecute()
    {
        $sidebarAction = new Sidebar();
        $result = $sidebarAction->execute();

        $this->assertIsString($result);
    }
}