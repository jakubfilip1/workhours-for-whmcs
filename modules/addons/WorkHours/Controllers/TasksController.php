<?php

namespace WorkHours\Controllers;

use WorkHours\Models\Tasks;
use WorkHours\Services\WorkService;

/**
 *
 */
class TasksController extends BaseController
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
        $tasks = Tasks::where('admin_id', $this->adminId)->get();

        $workService = new WorkService();
        $currentRunTask = $workService->getCurrentRunTask($this->adminId);

        return [
            'template' => 'tasks',
            'templateParams' => [
                'tasks' => $tasks,
                'currentRunTask' => $currentRunTask
            ]
        ];
    }

    /**
     * @return void
     */
    public function addTask() :void
    {
        $taskName = $_POST['taskName'];
        $taskDescription = $_POST['taskDescription'];

        Tasks::create([
            'admin_id' => $this->adminId,
            'name' => $taskName,
            'description' => $taskDescription
        ]);

        $this->route('TasksController', 'index');
    }

    /**
     * @return void
     */
    public function runTask() :void
    {
        $taskId = $_POST['taskId'];

        $workService = new WorkService();
        $workService->runTask($this->adminId, $taskId);

        $this->route('TasksController', 'index');
    }
}