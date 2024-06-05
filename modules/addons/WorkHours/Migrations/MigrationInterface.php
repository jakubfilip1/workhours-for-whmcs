<?php

namespace WorkHours\Migrations;

/**
 *
 */
interface MigrationInterface
{
    /**
     * @return mixed
     */
    public function up();

    /**
     * @return mixed
     */
    public function down();
}