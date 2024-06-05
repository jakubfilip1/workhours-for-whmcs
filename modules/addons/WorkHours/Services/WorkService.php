<?php

namespace WorkHours\Services;

use Carbon\Carbon;
use WorkHours\Models\WorkSchedule;
use WorkHours\Models\WorkSessions;

/**
 *
 */
class WorkService
{
    /**
     * @param int $adminId
     * @return void
     */
    public function startWork(int $adminId)
    {
        $now = Carbon::now();

        $workSession = WorkSessions::startWork($adminId, $now);

        $workSchedule = WorkSchedule::startTask($adminId, $workSession->id, null, $now, 'work');
    }

    /**
     * @param int $adminId
     * @return void
     */
    public function stopWork(int $adminId)
    {
        $now = Carbon::now();

        $workSession = WorkSessions::endWork($adminId, $now);

        $workSchedule = WorkSchedule::endLastTask($adminId, $now);
    }

    /**
     * @param int $adminId
     * @return void
     */
    public function startBreak(int $adminId)
    {
        $now = Carbon::now();

        WorkSchedule::startBreak($adminId, $now);
    }

    /**
     * @param int $adminId
     * @return void
     */
    public function endBreak(int $adminId)
    {
        $now = Carbon::now();

        WorkSchedule::endBreak($adminId, $now);
    }

    /**
     * @param int $adminId
     * @return null
     */
    public function getCurrentRunTask(int $adminId)
    {
        $lastTask = WorkSchedule::where('admin_id', '=', $adminId)
            ->whereNull('end_time')
            ->first();

        return $lastTask ?? null;
    }

    /**
     * @param int $adminId
     * @param int $taskId
     * @return WorkSchedule
     */
    public function runTask(int $adminId, int $taskId)
    {
        $now = Carbon::now();

        $lastTask = WorkSchedule::endLastTask($adminId, $now);

        return WorkSchedule::startTask($adminId, $lastTask->work_session_id, $taskId, $now, 'work');
    }
}