<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\curlingEvent;
use App\fakePage;

class curl extends Controller
{
    public function __construct()
    {
        $this->middleware('hasContent:' . $this->getContent());
    }

    public function getContent()
    {


        #Temporary FIX - remove
        $content = new fakePage();
        return $content->returnContent()[0]['html'];

        /*
                $url = 'https://laracasts.com/discuss/channels/general-discussion/pass-data-from-listener-to-event';
                return event(new curlingEvent(curl_init(),$url))[0];
        */

    }
}
