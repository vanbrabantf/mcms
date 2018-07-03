<?php

namespace Application\Art\Listeners;

use Domain\Art\ArtRepository;
use Application\Art\Jobs\UpdateArt as Command;

class UpdateArt
{
    /**
     * @var ArtRepository
     */
    private $artRepository;

    public function __construct(ArtRepository $artRepository)
    {
        $this->artRepository = $artRepository;
    }

    public function handle(Command $command): void
    {
        $this->artRepository->update(
            $command->getName(),
            $command->getDescription(),
            $command->getImagePath(),
            $command->getArtId()
        );
    }
}