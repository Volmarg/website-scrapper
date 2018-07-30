<?php

namespace App\Listeners;

use App\Events\curlingEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class curlingListener
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
     * @param  curlingEvent $event
     * @return void
     */
    public function handle(curlingEvent $event)
    {
        #returns content of curl
        return $this->getByFileContent($event->curlData['url']);
    }

    #this should be done by default
    private function getByCurl($event)
    {
        $c = $event->curlData['handler'];
        curl_setopt($c, CURLOPT_URL, trim($event->curlData['url']));

        $content = curl_exec($c);
        curl_close($c);

        return $content;
    }

    #this one is just used since curl is messing output - temporary solution
    private function getByFileContent($url)
    {

        return file_get_contents('http://www.heise.de');
    }

}
