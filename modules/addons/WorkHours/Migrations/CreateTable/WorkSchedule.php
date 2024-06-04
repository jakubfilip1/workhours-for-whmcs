<?php

namespace WorkHours\Migrations\CreateTable;

use WorkHours\Migrations\MigrationInterface;
use WHMCS\Database\Capsule;

class WorkSchedule implements MigrationInterface
{
    public function up()
    {
        Capsule::schema()
            ->create('WorkHours_WorkSchedule', function ($table) {
                $table->increments('id');
                $table->integer('admin_id')->unsigned();
                $table->datetime('start_time');
                $table->datetime('end_time')->nullable();
                $table->enum('type', ['work', 'break'])->default('work');
                $table->timestamps();
            });
    }

    public function down()
    {
        Capsule::schema()
            ->dropIfExists('WorkHours_WorkSchedule');
    }
}