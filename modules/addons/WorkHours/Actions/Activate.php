<?php

namespace WorkHours\Actions;

use Modules\Addons\WorkHours\Actions\ActionInterface;

class Activate implements ActionInterface
{
    public function execute()
    {
        try
        {
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