<?php

if (!defined("WHMCS"))
{
    die("This file cannot be accessed directly");
}

require_once __DIR__ . DIRECTORY_SEPARATOR . "vendor" . DIRECTORY_SEPARATOR . "autoload.php";

function WorkHours_config()
{
    $configAction = new \WorkHours\Actions\Config();
    return $configAction->execute();
}

function WorkHours_activate()
{
    try
    {
        return [
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return [
            'status' => "error",
            'description' => $e->getMessage()
        ];
    }
}

function WorkHours_deactivate()
{
    try
    {
        return [
            'status' => 'success'
        ];
    } catch (\Exception $e) {
        return [
            "status" => "error",
            "description" => $e->getMessage()
        ];
    }
}

function WorkHours_output($params)
{
    echo "";
}
