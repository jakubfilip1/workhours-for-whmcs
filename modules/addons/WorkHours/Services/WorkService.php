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

        $workSchedule = WorkSchedule::endLastTask($adminId, $workSession->id, $now);
    }
}