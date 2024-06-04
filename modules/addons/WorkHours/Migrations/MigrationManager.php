<?php

namespace WorkHours\Migrations;

class MigrationManager
{
    protected array $migrations = [];

    public function addMigration(MigrationInterface $migration, string $direction) :void
    {
        $this->migrations[] = [
            'migration' => $migration,
            'direction' => $direction
        ];
    }

    public function runMigrations() :void
    {
        foreach($this->migrations as $migration)
        {
            if($migration['direction'] === MigrationDirection::UP)
            {
                $migration['migration']->up();
            }
            else
            {
                $migration['migration']->down();
            }
        }
    }
}