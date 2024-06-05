<?php

namespace WorkHours\Actions;

use WorkHours\Migrations\CreateTable\Tasks;
use WorkHours\Migrations\CreateTable\WorkSchedule;
use WorkHours\Migrations\CreateTable\WorkSessions;
use WorkHours\Migrations\MigrationDirection;
use WorkHours\Migrations\MigrationManager;

class Deactivate implements ActionInterface
{
    public function execute() :array
    {
        try
        {
            $migrationManager = new MigrationManager();
            $migrationManager->addMigration(new WorkSessions(), MigrationDirection::DOWN);
            $migrationManager->addMigration(new Tasks(), MigrationDirection::DOWN);
            $migrationManager->addMigration(new WorkSchedule(), MigrationDirection::DOWN);
            $migrationManager->runMigrations();

            return [
                'status' => 'success'
            ];
        } catch (\Exception $e) {
            return [
                "status" => "error",
                "description" => $e->getMessage()
            ];
        }
    }
}