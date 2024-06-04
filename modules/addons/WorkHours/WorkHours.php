<?php

if (!defined("WHMCS"))
{
    die("This file cannot be accessed directly");
}

function WorkHours_config()
{
    return [
        'name' => 'WorkHours',
        'description' => 'Module for monitoring employee working time.',
        'author' => 'Jakub Filip',
        'language' => 'english',
        'version' => '1.0.0'
    ];
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
