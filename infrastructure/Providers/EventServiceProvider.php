<?php

namespace Infrastructure\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mAppings for the Application.
     *
     * @var array
     */
    protected $listen = [
        'Infrastructure\Events\Event' => [
            'Infrastructure\Listeners\EventListener',
        ],
    ];

    /**
     * Register any events for your Application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
