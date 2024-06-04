<?php

namespace WorkHours\Models;

use WHMCS\Model\AbstractModel;

class WorkSessions extends AbstractModel
{
    protected $table = "WorkHours_WorkSessions";
    protected $primaryKey = "id";
}