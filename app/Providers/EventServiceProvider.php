<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    #INFO: check which events are not used and remove them
    protected $listen = [
        'App\Events\CurlingEvent' => ['App\Listeners\CurlingListener'],
        'App\Events\CurlHeaderEvent' => ['App\Listeners\CurlHeaderListener'],
        'App\Events\GetHeaderEvent' => ['App\Listeners\GetHeaderListener'],
        'App\Events\CurlContentEvent' => ['App\Listeners\CurlContentListener']
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
