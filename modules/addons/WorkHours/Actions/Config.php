<?php

namespace WorkHours\Actions;

class Config implements ActionInterface
{
    protected string $name = 'Work Hours';
    protected string $description = 'Module for monitoring employee working time.';
    protected string $author = "Jakub Filip";
    protected string $language = "english";
    protected string $version = "1.0.0";

    public function execute() :array
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