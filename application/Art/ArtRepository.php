<?php

namespace Application\Art;

use Domain\Art;
use Domain\Art\ArtId;
use Domain\Art\ArtRepository as ArtRepositoryInterface;

class ArtRepository implements ArtRepositoryInterface
{
    public function add(String $name, String $description, String $imagePath = null): void
    {
        Art::create([
           'name' => $name,
           'description' => $description,
           'image' => $imagePath,
        ]);
    }

    public function update(
        String $name,
        String $description,
        String $imagePath = null,
        ArtId $artId
    ): void
    {
        Art::where('id', $artId)
            ->update([
                'name' => $name,
                'description' => $description,
                'image' => $imagePath,
            ]);
    }
}