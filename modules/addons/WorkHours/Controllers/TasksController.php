<?php

namespace WorkHours\Controllers;

use WorkHours\Models\Tasks;

class TasksController extends BaseController
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
        $tasks = Tasks::where('admin_id', $this->adminId)->get();

        return [
            'template' => 'tasks',
            'templateParams' => [
                'tasks' => $tasks
            ]
        ];
    }

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
}