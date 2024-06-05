<?php

namespace WorkHours\Models;

use WHMCS\Model\AbstractModel;
use Carbon\Carbon;

/**
 *
 */
class Tasks extends AbstractModel
{
    /**
     * @var string
     */
    protected $table = "WorkHours_Tasks";
    /**
     * @var string
     */
    protected $primaryKey = "id";
    /**
     * @var string[]
     */
    protected $fillable = ['admin_id', 'name', 'description'];
}