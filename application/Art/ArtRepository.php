<?php

namespace Application\Art;

use Domain\Art;
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
}