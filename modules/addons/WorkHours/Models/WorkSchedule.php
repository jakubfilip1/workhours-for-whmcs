<?php

namespace WorkHours\Models;

use WHMCS\Model\AbstractModel;
use Carbon\Carbon;

/**
 *
 */
class WorkSchedule extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = "WorkHours_WorkSchedule";
    /**
     * @var string
     */
    protected $primaryKey = "id";

    /**
     * @var string[]
     */
    protected $fillable = ['admin_id', 'work_session_id', 'task_id', 'start_time', 'end_time', 'type'];

    /**
     * @param int $adminId
     * @return bool
     */
    public static function isEmployeeCurrentlyAtBreak(int $adminId) :bool
    {
        $lastSession = self::where('admin_id', '=', $adminId)->where('type', '=', 'break')->orderBy('created_at', 'desc')->first();

        return !is_null($lastSession) && is_null($lastSession->end_time);
    }

    /**
     * @param int $adminId
     * @param int $workSessionId
     * @param int|null $taskId
     * @param Carbon $now
     * @param string $type
     * @return self
     */
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

    /**
     * @param int $adminId
     * @param Carbon $now
     * @return self|null
     */
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

    /**
     * @param int $adminId
     * @param Carbon $now
     * @return self
     */
    public static function startBreak(int $adminId, Carbon $now) :self
    {
        $lastTask = self::endLastTask($adminId, $now);

        return self::startTask($adminId, $lastTask->work_session_id, null, $now, 'break');
    }

    /**
     * @param int $adminId
     * @param Carbon $now
     * @return self
     */
    public static function endBreak(int $adminId, Carbon $now) :self
    {
        $lastTask = self::endLastTask($adminId, $now);

        return self::startTask($adminId, $lastTask->work_session_id, null, $now, 'work');
    }
}