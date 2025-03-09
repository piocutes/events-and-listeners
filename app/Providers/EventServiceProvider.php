<?php

namespace App\Providers;

use App\Events\OrderPlaced;
use App\Listeners\NotifyAdmin;
use App\Listeners\SendOrderEmail;
use Illuminate\Support\Facades\Event;
use App\Listeners\SendOrderNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        \App\Events\OrderPlaced::class => [
            \App\Listeners\SendOrderEmail::class,
            \App\Listeners\NotifyAdmin::class,
        ],
    ];
    

    /**
     * Register any events for your application.
     */
    public function boot()
    {
        parent::boot();
    }
}
