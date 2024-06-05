<?php

namespace WorkHours\Models;

use WHMCS\Model\AbstractModel;
use Carbon\Carbon;

/**
 *
 */
class WorkSessions extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = "WorkHours_WorkSessions";
    /**
     * @var string
     */
    protected $primaryKey = "id";

    /**
     * @var string[]
     */
    protected $fillable = ['admin_id', 'start_time', 'end_time'];

    /**
     * @param int $adminId
     * @return bool
     */
    public static function isEmployeeCurrentlyAtWork(int $adminId) :bool
    {
        $lastSession = self::where('admin_id', '=', $adminId)->orderBy('created_at', 'desc')->first();

        return !is_null($lastSession) && is_null($lastSession->end_time);
    }

    /**
     * @param int $adminId
     * @param Carbon $now
     * @return self
     */
    public static function startWork(int $adminId, Carbon $now) :self
    {
        return self::create([
            'admin_id' => $adminId,
            'start_time' => $now
        ]);
    }

    /**
     * @param int $adminId
     * @param Carbon $now
     * @return self|null
     */
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