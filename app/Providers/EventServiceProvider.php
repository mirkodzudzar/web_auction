<?php

namespace App\Providers;

use App\Events\ItemExpired;
use App\Events\ItemSold;
use App\Listeners\NotifyUsersItemExpired;
use App\Listeners\NotifyUsersItemSold;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        ItemExpired::class => [
            NotifyUsersItemExpired::class,
        ],

        ItemSold::class => [
            NotifyUsersItemSold::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
