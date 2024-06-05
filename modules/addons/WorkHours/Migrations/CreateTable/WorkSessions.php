<?php

namespace WorkHours\Migrations\CreateTable;

use WorkHours\Migrations\MigrationInterface;
use WHMCS\Database\Capsule;

/**
 *
 */
class WorkSessions implements MigrationInterface
{
    /**
     * @return void
     */
    public function up()
    {
        Capsule::schema()
            ->create('WorkHours_WorkSessions', function ($table) {
                $table->increments('id');
                $table->integer('admin_id')->unsigned();
                $table->datetime('start_time');
                $table->datetime('end_time')->nullable();
                $table->timestamps();
            });
    }

    /**
     * @return void
     */
    public function down()
    {
        Capsule::schema()
            ->dropIfExists('WorkHours_WorkSessions');
    }
}