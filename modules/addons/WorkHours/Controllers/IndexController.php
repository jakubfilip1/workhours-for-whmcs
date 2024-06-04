<?php

namespace WorkHours\Controllers;

use WorkHours\Models\WorkSessions;
use WorkHours\Services\WorkService;

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
        $workService = new WorkService();
        $workService->startWork($this->adminId);

        $this->route('IndexController', 'index');
    }

    public function endWork() :void
    {
        $workService = new WorkService();
        $workService->stopWork($this->adminId);

        $this->route('IndexController', 'index');
    }
}