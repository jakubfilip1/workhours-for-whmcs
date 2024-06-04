<?php

namespace WorkHours\Models;

use WHMCS\Model\AbstractModel;
use Carbon\Carbon;

class WorkSessions extends AbstractModel
{
    protected $table = "WorkHours_WorkSessions";
    protected $primaryKey = "id";

    protected $fillable = ['admin_id', 'start_time', 'end_time'];

    public static function isEmployeeCurrentlyAtWork(int $adminId) :bool
    {
        $lastSession = self::where('admin_id', '=', $adminId)->orderBy('created_at', 'desc')->first();

        return !is_null($lastSession) && is_null($lastSession->end_time);
    }

    public static function startWork(int $adminId, Carbon $now) :self
    {
        return self::create([
            'admin_id' => $adminId,
            'start_time' => $now
        ]);
    }

    public static function endWork(int $adminId, Carbon $now) :?self
    {
        $workSession = self::where('admin_id', '=', $adminId)
            ->whereNull('end_time')
            ->first();

        if(!$workSession)
        {
            return null;
        }

        $workSession->end_time = $now;
        $workSession->save();

        return $workSession;
    }
}