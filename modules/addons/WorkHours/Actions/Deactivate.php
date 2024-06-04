<?php

namespace WorkHours\Actions;

use WorkHours\Actions\ActionInterface;

class Deactivate implements ActionInterface
{
    public function execute() :array
    {
        try
        {
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