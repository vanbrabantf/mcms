<?php

namespace Domain\Art;

interface ArtRepository
{
    public function add(String $name, String $description, String $imagePath = null): void;
}