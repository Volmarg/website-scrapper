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
    protected $listen = [
        'App\Events\CurlingEvent' => ['App\Listeners\CurlingListener'],
        'App\Events\CurlHeaderEvent'=>['App\Listeners\CurlHeaderListener'],
        'App\Events\CurlContentEvent'=>['App\Listeners\CurlContentListener']
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
