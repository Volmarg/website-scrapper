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
        #returns content of curl
        $c=$event->curlData['handler'];
        curl_setopt($c, CURLOPT_URL, trim($event->curlData['url']));

        $content=curl_exec($c);
        curl_close($c);
        return $content;
    }
}
