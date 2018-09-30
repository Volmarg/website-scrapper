<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CurlContentEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

    public $page_content;

    public function __construct($url)
    {
        $this->page_content=$this->initialize_curl($url);

    }

    private function initialize_curl($url){

        $curl= curl_init();
        curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        #Optimization part
        curl_setopt($curl, CURLOPT_ENCODING, '');
        //set gzip, deflate or keep empty for server to detect and set supported encoding.

        #Store in var fix
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

        #Https fixes
        curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

        #Keep Session
        curl_setopt($curl, CURLOPT_COOKIESESSION, true);
        curl_setopt($curl, CURLOPT_COOKIEJAR, 'cookie-name');
        //could be empty, but cause problems on some hosts
        curl_setopt($curl, CURLOPT_COOKIEFILE, '/var/www/ip4.x/file/tmp');

        curl_setopt($curl, CURLOPT_URL, trim($url));

        $content = curl_exec($curl);
        curl_close($curl);

        #$content=file_get_contents($url);
        return $content;
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
