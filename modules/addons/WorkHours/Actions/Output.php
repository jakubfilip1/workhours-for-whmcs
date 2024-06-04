<?php

namespace WorkHours\Actions;

use Modules\Addons\WorkHours\Actions\ActionInterface;

class Output implements ActionInterface
{
    protected $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function execute()
    {
        echo "";
    }
}