<?php

namespace Application\Art\Listeners;

use Application\Art\Jobs\CreateNewArt as Command;
use Domain\Art\ArtRepository;

class CreateNewArt
{
    /**
     * @var ArtRepository
     */
    private $artRepository;

    public function __construct(ArtRepository $artRepository)
    {
        $this->artRepository = $artRepository;
    }

    public function handle(Command $command)
    {
        $this->artRepository->add(
            $command->getName(),
            $command->getDescription(),
            $command->getImagePath()
        );
    }
}