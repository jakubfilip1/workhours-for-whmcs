<div class="container mt-5" style="padding: 10px 15px; margin: 20px 0; background-color: #F6F6F6; border-bottom: 1px dashed #CCC; width: 100%;">
    <form method="POST" action="addonmodules.php?module=WorkHours&controller=TasksController&action=addTask">
        <div class="form-group">
            <label for="taskName">Task Name</label>
            <input type="text" name="taskName" id="taskName" class="form-control">
        </div>
        <div class="form-group">
            <label for="taskDescription">Task Description</label>
            <input type="text" name="taskDescription" id="taskDescription" class="form-control">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Add Task</button>
        </div>
    </form>
</div>
<div class="tablebg">
    <table class="datatable" width="100%" border="0" cellspacing="1" cellpadding="3">
        <tbody>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th width="150">Actions</th>
            </tr>
            {foreach $WorkHoursParams['tasks'] as $task}
                <tr>
                    <td>{$task->name}</td>
                    <td>{$task->description}</td>
                    <td>
                        {if $WorkHoursParams['currentRunTask']->task_id == $task->id}
                            <div style="display: inline-block">
                                <form method="POST" action="addonmodules.php?module=WorkHours&controller=TasksController&action=stopTask">
                                    <input type="hidden" name="taskId" value="{$task->id}">
                                    <button type="submit" class="btn btn-danger">Stop</button>
                                </form>
                            </div>
                        {else}
                            <div style="display: inline-block">
                                <form method="POST" action="addonmodules.php?module=WorkHours&controller=TasksController&action=runTask">
                                    <input type="hidden" name="taskId" value="{$task->id}">
                                    <button type="submit" class="btn btn-success">Run</button>
                                </form>
                            </div>
                        {/if}
                    </td>
                </tr>
            {/foreach}
        </tbody>
    </table>
</div>