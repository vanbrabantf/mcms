<?php

namespace Infrastructure\Art;

use Application\Art\ArtRepository;
use Domain\Art\ArtRepository as ArtRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class ArtServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any Application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ArtRepositoryInterface::class, ArtRepository::class);
    }

    /**
     * Register any Application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}