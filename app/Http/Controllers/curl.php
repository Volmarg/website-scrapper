<?php

namespace App\Http\Controllers\Curl;

use Illuminate\Http\Request;
use App\Events\curlingEvent;
use App\Http\Controllers\domController;

class curl extends Controller
{
#INFO: REMOVE IT
    public $content;

    public function __construct()
    {
        $this->content=$this->getContent();
    }

    public function getContent()
    {

        $url = 'www.wp.pl';
        return event(new curlingEvent(curl_init(), $url));


    }

    public function showContent()
    {



    }
}
