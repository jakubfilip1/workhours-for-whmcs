<?php

namespace WorkHours\Models;

use WHMCS\Model\AbstractModel;
use Carbon\Carbon;

class WorkSchedule extends AbstractModel
{
    protected $table = "WorkHours_WorkSchedule";
    protected $primaryKey = "id";

    protected $fillable = ['admin_id', 'work_session_id', 'task_id', 'start_time', 'end_time', 'type'];

    public static function startTask(int $adminId, int $workSessionId, ?int $taskId, Carbon $now, $type) :self
    {
        return self::create([
            'admin_id' => $adminId,
            'work_session_id' => $workSessionId,
            'task_id' => $taskId,
            'start_time' => $now,
            'type' => $type
        ]);
    }

    public static function endLastTask(int $adminId, int $workSessionId, Carbon $now) :?self
    {
        $workSchedule = self::where('admin_id', '=', $adminId)
            ->where('work_session_id', '=', $workSessionId)
            ->whereNull('end_time')
            ->first();

        if(!$workSchedule)
        {
            return null;
        }

        $workSchedule->end_time = $now;
        $workSchedule->save();

        return $workSchedule;
    }
}