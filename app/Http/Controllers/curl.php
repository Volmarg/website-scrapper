<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\curlingEvent;

class curl extends Controller
{
    public function getContent(){

        $url='https://laracasts.com/discuss/channels/general-discussion/pass-data-from-listener-to-event';
        $content=event(new curlingEvent(curl_init(),$url))[0];

        echo $content;


    }
}
