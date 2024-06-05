<?php

namespace WorkHours\Migrations\CreateTable;

use WorkHours\Migrations\MigrationInterface;
use WHMCS\Database\Capsule;

class Tasks implements MigrationInterface
{
    public function up()
    {
        Capsule::schema()
            ->create('WorkHours_Tasks', function ($table) {
                $table->increments('id');
                $table->integer('admin_id')->unsigned();
                $table->string('name');
                $table->text('description');
                $table->timestamps();
            });
    }

    public function down()
    {
        Capsule::schema()
            ->dropIfExists('WorkHours_Tasks');
    }
}