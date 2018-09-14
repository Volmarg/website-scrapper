<?php

namespace App\Listeners;

use App\Events\CurlContentEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CurlContentListener
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
     * @param  CurlContentEvent  $event
     * @return void
     */
    public function handle(CurlContentEvent $event)
    {

        return $event->page_content;
    }
}
