<?php

namespace WorkHours\Controllers;

abstract class BaseController
{
    protected function route($controller, $action)
    {
        header('Location: addonmodules.php?module=WorkHours&controller=' . $controller . '&action=' . $action);
        exit();
    }
}