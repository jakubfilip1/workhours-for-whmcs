<?php

namespace WorkHours\Models;

use WHMCS\Model\AbstractModel;
use Carbon\Carbon;

class Tasks extends AbstractModel
{
    protected $table = "WorkHours_Tasks";
    protected $primaryKey = "id";
    protected $fillable = ['admin_id', 'name', 'description'];
}