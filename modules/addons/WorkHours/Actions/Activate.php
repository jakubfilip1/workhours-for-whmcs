<?php

namespace WorkHours\Actions;

use WorkHours\Actions\ActionInterface;
use WorkHours\Migrations\CreateTable\WorkSchedule;
use WorkHours\Migrations\MigrationDirection;
use WorkHours\Migrations\MigrationManager;

class Activate implements ActionInterface
{
    public function execute() :array
    {
        try
        {
            $migrationManager = new MigrationManager();
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