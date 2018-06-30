<?php

namespace Application\Art\Jobs;

class CreateNewArt
{
    /**
     * @var String
     */
    private $name;

    /**
     * @var String
     */
    private $description;

    /**
     * @var String
     */
    private $imagePath;

    public function __construct(String $name, String $description, String $imagePath = null)
    {
        $this->name = $name;
        $this->description = $description;
        $this->imagePath = $imagePath;
    }

    /**
     * @return String
     */
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * @return String
     */
    public function getDescription(): String
    {
        return $this->description;
    }

    /**
     * @return String
     */
    public function getImagePath(): ?String
    {
        return $this->imagePath;
    }
}