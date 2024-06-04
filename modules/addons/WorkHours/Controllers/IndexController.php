<?php

namespace WorkHours\Controllers;

class IndexController
{
    protected array $params;
    protected int $adminId;

    public function __construct(array $params, int $adminId)
    {
        $this->params = $params;
        $this->adminId = $adminId;
    }

    public function index()
    {
        return [
            'template' => 'index',
            'templateParams' => []
        ];
    }
}