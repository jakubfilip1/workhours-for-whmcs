<?php

namespace WorkHours\Actions;

use Modules\Addons\WorkHours\Actions\ActionInterface;

class Config implements ActionInterface
{
    protected $name = 'WorkHours';
    protected $description = 'Module for monitoring employee working time.';
    protected $author = "Jakub Filip";
    protected $language = "english";
    protected $version = "1.0.0";

    public function execute()
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'author' => $this->author,
            'language' => $this->language,
            'version' => $this->version
        ];
    }
}