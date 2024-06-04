<?php

namespace WorkHours\Services;

use Carbon\Carbon;
use WorkHours\Models\WorkSchedule;
use WorkHours\Models\WorkSessions;

class WorkService
{
    public function startWork(int $adminId)
    {
        $now = Carbon::now();

        $workSession = WorkSessions::startWork($adminId, $now);

        $workSchedule = WorkSchedule::startTask($adminId, $workSession->id, null, $now, 'work');
    }

    public function stopWork(int $adminId)
    {
        $now = Carbon::now();

        $workSession = WorkSessions::endWork($adminId, $now);

        $workSchedule = WorkSchedule::endLastTask($adminId, $now);
    }

    public function startBreak(int $adminId)
    {
        $now = Carbon::now();

        WorkSchedule::startBreak($adminId, $now);
    }

    public function endBreak(int $adminId)
    {
        $now = Carbon::now();

        WorkSchedule::endBreak($adminId, $now);
    }
}