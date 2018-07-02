<?php

namespace Application\Art\Jobs;

use Domain\Art\ArtId;

class UpdateArt
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

    /**
     * @var ArtId
     */
    private $artId;

    public function __construct(
        String $name,
        String $description,
        String $imagePath = null,
        ArtId $artId
    ) {
        $this->name = $name;
        $this->description = $description;
        $this->imagePath = $imagePath;
        $this->artId = $artId;
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

    /**
     * @return ArtId
     */
    public function getArtId(): ArtId
    {
        return $this->artId;
    }
}