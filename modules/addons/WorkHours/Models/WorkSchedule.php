<?php

namespace WorkHours\Models;

use WHMCS\Model\AbstractModel;

class WorkSchedule extends AbstractModel
{
    protected $table = "WorkHours_WorkSchedule";
    protected $primaryKey = "id";
}