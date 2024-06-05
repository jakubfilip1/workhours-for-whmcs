<?php

namespace WorkHours\Controllers;

use WorkHours\Models\WorkSchedule;
use WorkHours\Models\WorkSessions;
use WorkHours\Services\WorkService;

/**
 *
 */
class IndexController extends BaseController
{
    /**
     * @var array
     */
    protected array $params;
    /**
     * @var int
     */
    protected int $adminId;

    /**
     * @param array $params
     * @param int $adminId
     */
    public function __construct(array $params, int $adminId)
    {
        $this->params = $params;
        $this->adminId = $adminId;
    }

    /**
     * @return array
     */
    public function index() :array
    {
        $isEmployeeCurrentlyAtWork = WorkSessions::isEmployeeCurrentlyAtWork($this->adminId);
        $isEmployeeCurrentlyAtBreak = WorkSchedule::isEmployeeCurrentlyAtBreak($this->adminId);

        return [
            'template' => 'index',
            'templateParams' => [
                'isEmployeeCurrentlyAtWork' => $isEmployeeCurrentlyAtWork,
                'isEmployeeCurrentlyAtBreak' => $isEmployeeCurrentlyAtBreak
            ]
        ];
    }

    /**
     * @return void
     */
    public function startWork() :void
    {
        $workService = new WorkService();
        $workService->startWork($this->adminId);

        $this->route('IndexController', 'index');
    }

    /**
     * @return void
     */
    public function endWork() :void
    {
        $workService = new WorkService();
        $workService->stopWork($this->adminId);

        $this->route('IndexController', 'index');
    }

    /**
     * @return void
     */
    public function startBreak() :void
    {
        $workService = new WorkService();
        $workService->startBreak($this->adminId);

        $this->route('IndexController', 'index');
    }

    /**
     * @return void
     */
    public function endBreak() :void
    {
        $workService = new WorkService();
        $workService->endBreak($this->adminId);

        $this->route('IndexController', 'index');
    }
}