<?php

namespace App\Listeners;

use App\Events\curlingEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class curlingSettings
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
     * @param  curlingEvent  $event
     * @return void
     */
    public function handle(curlingEvent $event)
    {
        dd('event test');
    }
}
