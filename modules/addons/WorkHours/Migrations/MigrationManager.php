<?php

namespace WorkHours\Migrations;

class MigrationManager
{
    protected array $migrations = [];

    public function addMigration(MigrationInterface $migration) :void
    {
        $this->migrations[] = $migration;
    }

    public function runMigrations() :void
    {
        foreach($this->migrations as $migration)
        {
            $migration->execute();
        }
    }
}