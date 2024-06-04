<?php

namespace WorkHours\Models;

use WHMCS\Model\AbstractModel;

class WorkSessions extends AbstractModel
{
    protected $table = "WorkHours_WorkSessions";
    protected $primaryKey = "id";

    public static function isEmployeeCurrentlyAtWork(int $adminId) :bool
    {
        $lastSession = self::where('admin_id', '=', $adminId)->orderBy('created_at', 'desc')->first();

        return !is_null($lastSession) && is_null($lastSession->end_time);
    }
}