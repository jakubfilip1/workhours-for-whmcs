<?php

namespace WorkHours\Actions;

/**
 *
 */
class Sidebar implements ActionInterface
{
    /**
     * @return string
     */
    public function execute() :string
    {
        return <<<HTML
<div class="sidebar-header">
Work Hours
</div>
<ul class="menu">
    <li>
        <a href="addonmodules.php?module=WorkHours&controller=IndexController&action=index">Home</a>
    </li>
    <li>
        <a href="addonmodules.php?module=WorkHours&controller=TasksController&action=index">Tasks</a>
    </li>
</ul>
HTML;
    }
}