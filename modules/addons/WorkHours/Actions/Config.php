<?php

namespace WorkHours\Actions;

/**
 *
 */
class Config implements ActionInterface
{
    /**
     * @var string
     */
    protected string $name = 'Work Hours';
    /**
     * @var string
     */
    protected string $description = 'Module for monitoring employee working time.';
    /**
     * @var string
     */
    protected string $author = "Jakub Filip";
    /**
     * @var string
     */
    protected string $language = "english";
    /**
     * @var string
     */
    protected string $version = "1.0.0";

    /**
     * @return array
     */
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