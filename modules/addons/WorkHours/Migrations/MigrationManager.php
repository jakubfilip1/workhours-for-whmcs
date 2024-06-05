<?php

namespace WorkHours\Migrations;

/**
 *
 */
class MigrationManager
{
    /**
     * @var array
     */
    protected array $migrations = [];

    /**
     * @param MigrationInterface $migration
     * @param string $direction
     * @return void
     */
    public function addMigration(MigrationInterface $migration, string $direction) :void
    {
        $this->migrations[] = [
            'migration' => $migration,
            'direction' => $direction
        ];
    }

    /**
     * @return void
     */
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