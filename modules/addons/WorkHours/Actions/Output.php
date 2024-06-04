<?php

namespace WorkHours\Actions;

use WorkHours\Actions\ActionInterface;

class Output implements ActionInterface
{
    protected array $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function execute() :void
    {
        echo "";
    }
}