<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CurlingEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public $curlData;

    public function __construct($curl, $url)
    {
        $this->loadSettings($curl, $url);
    }

    private function loadSettings($curl, $url)
    {
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        #Optimization part
        curl_setopt($curl, CURLOPT_ENCODING, '');
        //set gzip, deflate or keep empty for server to detect and set supported encoding.

        #Store in var fix
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        #Https fixes
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 0);

        #Keep Session
        curl_setopt($curl, CURLOPT_COOKIESESSION, true);
        curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie-name');
        //could be empty, but cause problems on some hosts
        curl_setopt($curl, CURLOPT_COOKIEFILE, '/var/www/ip4.x/file/tmp');

        $this->curlData = array(
            'handler' => $curl,
            'url' => $url,
        );
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
