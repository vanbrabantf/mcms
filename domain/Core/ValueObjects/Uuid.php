<?php

namespace Domain\Core\ValueObjects;

use Domain\Core\Observers\UuidObserver;

trait UuidModel
{
    /**
     * Registers the Model observer responsible for generating the UUIDs.
     */
    public static function bootUuidModel(): void
    {
        static::observe(new UuidObserver());
    }
}