<?php

namespace WorkHours\Models;

use WHMCS\Model\AbstractModel;
use Carbon\Carbon;

class WorkSchedule extends AbstractModel
{
    protected $table = "WorkHours_WorkSchedule";
    protected $primaryKey = "id";

    protected $fillable = ['admin_id', 'work_session_id', 'task_id', 'start_time', 'end_time', 'type'];

    public static function isEmployeeCurrentlyAtBreak(int $adminId) :bool
    {
        $lastSession = self::where('admin_id', '=', $adminId)->where('type', '=', 'break')->orderBy('created_at', 'desc')->first();

        return !is_null($lastSession) && is_null($lastSession->end_time);
    }

    public static function startTask(int $adminId, int $workSessionId, ?int $taskId, Carbon $now, string $type) :self
    {
        return self::create([
            'admin_id' => $adminId,
            'work_session_id' => $workSessionId,
            'task_id' => $taskId,
            'start_time' => $now,
            'type' => $type
        ]);
    }

    public static function endLastTask(int $adminId, Carbon $now) :?self
    {
        $workSchedule = self::where('admin_id', '=', $adminId)
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

    public static function startBreak(int $adminId, Carbon $now) :self
    {
        $lastTask = self::endLastTask($adminId, $now);

        return self::startTask($adminId, $lastTask->work_session_id, null, $now, 'break');
    }

    public static function endBreak(int $adminId, Carbon $now) :self
    {
        $lastTask = self::endLastTask($adminId, $now);

        return self::startTask($adminId, $lastTask->work_session_id, null, $now, 'work');
    }
}