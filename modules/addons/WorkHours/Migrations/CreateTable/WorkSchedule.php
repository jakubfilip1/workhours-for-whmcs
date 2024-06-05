<?php

namespace WorkHours\Migrations\CreateTable;

use WorkHours\Migrations\MigrationInterface;
use WHMCS\Database\Capsule;

/**
 *
 */
class WorkSchedule implements MigrationInterface
{
    /**
     * @return void
     */
    public function up()
    {
        Capsule::schema()
            ->create('WorkHours_WorkSchedule', function ($table) {
                $table->increments('id');
                $table->integer('admin_id')->unsigned();
                $table->integer('work_session_id')->unsigned();
                $table->integer('task_id')->unsigned()->nullable();
                $table->datetime('start_time');
                $table->datetime('end_time')->nullable();
                $table->enum('type', ['work', 'break'])->default('work');
                $table->timestamps();
            });
    }

    /**
     * @return void
     */
    public function down()
    {
        Capsule::schema()
            ->dropIfExists('WorkHours_WorkSchedule');
    }
}