<?php

namespace WorkHours\Actions;

class Deactivate
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
                "status" => "error",
                "description" => $e->getMessage()
            ];
        }
    }
}