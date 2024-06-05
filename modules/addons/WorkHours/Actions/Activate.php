<?php

namespace WorkHours\Actions;

use WorkHours\Migrations\CreateTable\Tasks;
use WorkHours\Migrations\CreateTable\WorkSchedule;
use WorkHours\Migrations\CreateTable\WorkSessions;
use WorkHours\Migrations\MigrationDirection;
use WorkHours\Migrations\MigrationManager;

/**
 *
 */
class Activate implements ActionInterface
{
    /**
     * @return array|string[]
     */
    public function execute() :array
    {
        try
        {
            $migrationManager = new MigrationManager();
            $migrationManager->addMigration(new WorkSessions(), MigrationDirection::UP);
            $migrationManager->addMigration(new Tasks(), MigrationDirection::UP);
            $migrationManager->addMigration(new WorkSchedule(), MigrationDirection::UP);
            $migrationManager->runMigrations();

            return [
                'status' => 'success'
            ];
        } catch (\Exception $e) {
            return [
                'status' => "error",
                'description' => $e->getMessage()
            ];
        }
    }
}