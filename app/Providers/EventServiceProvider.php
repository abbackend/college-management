<?php

namespace App\Providers;

use App\Models\Result;
use App\Models\User;
use App\Observers\ResultObserver;
use App\Observers\UserObserver;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [];

    /**
     * The model observers to register.
     *
     * @var array<string, string|object|array<int, string|object>>
     */
    protected $observers = [
        User::class => UserObserver::class,
        Result::class => ResultObserver::class,
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
