<?php

namespace WorkHours\Models;

use WHMCS\Config\Setting as WHMCSSetting;

class Setting extends WHMCSSetting
{
    public static function getSystemURL()
    {
        $systemURL = self::getValue('SystemURL');

        if(substr($systemURL, -1) !== "/")
        {
            $systemURL .= "/";
        }

        return $systemURL;
    }
}