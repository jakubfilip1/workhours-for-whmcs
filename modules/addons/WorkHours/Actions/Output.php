<?php

namespace WorkHours\Actions;

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