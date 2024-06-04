<?php

namespace WorkHours\Controllers;

use WorkHours\Models\WorkSessions;

class IndexController extends BaseController
{
    protected array $params;
    protected int $adminId;

    public function __construct(array $params, int $adminId)
    {
        $this->params = $params;
        $this->adminId = $adminId;
    }

    public function index() :array
    {
        $isEmployeeCurrentlyAtWork = WorkSessions::isEmployeeCurrentlyAtWork($this->adminId);

        return [
            'template' => 'index',
            'templateParams' => [
                'isEmployeeCurrentlyAtWork' => $isEmployeeCurrentlyAtWork
            ]
        ];
    }

    public function startWork() :void
    {
        WorkSessions::startWork($this->adminId);

        $this->route('IndexController', 'index');
    }

    public function endWork() :void
    {
        WorkSessions::endWork($this->adminId);

        $this->route('IndexController', 'index');
    }
}