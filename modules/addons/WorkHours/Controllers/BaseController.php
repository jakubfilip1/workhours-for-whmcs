<?php

namespace WorkHours\Controllers;

/**
 *
 */
abstract class BaseController
{
    /**
     * @param $controller
     * @param $action
     * @return void
     */
    protected function route($controller, $action)
    {
        header('Location: addonmodules.php?module=WorkHours&controller=' . $controller . '&action=' . $action);
        exit();
    }
}