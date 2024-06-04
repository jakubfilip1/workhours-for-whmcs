<?php

namespace WorkHours\Actions;

class Activate
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