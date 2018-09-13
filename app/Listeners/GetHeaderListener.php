<?php

namespace App\Listeners;

use App\Events\GetHeaderEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class GetHeaderListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  GetHeaderEvent  $event
     * @return void
     */
    public function handle(GetHeaderEvent $event)
    {
        return $event->headers;
    }
}
