<?php

if (!defined("WHMCS"))
{
    die("This file cannot be accessed directly");
}

require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

use WHMCS\Session;

function WorkHours_config()
{
    $configAction = new \WorkHours\Actions\Config();
    return $configAction->execute();
}

function WorkHours_activate()
{
    $activateAction = new \WorkHours\Actions\Activate();
    return $activateAction->execute();
}

function WorkHours_deactivate()
{
    $deactivateAction = new \WorkHours\Actions\Deactivate();
    return $deactivateAction->execute();
}

function WorkHours_output($params)
{
    $smarty = new \Smarty();
    $adminId = Session::get('adminid');

    $outputAction = new \WorkHours\Actions\Output($smarty, $params, $adminId);
    $outputAction->execute();
}
