<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Curl\Fetch;
use App\Http\Controllers\DOM\DOM;

class ProcessControll extends Controller
{
    public $request,$headers,$contents;

    public function __construct($request)
    {

        $this->request=$request;
    }

    public function start(){
        $curl_fetch=new Fetch($this->request['links']);
        $dom = new DOM();

        $curl_fetch->getHeaders();
        $contents=$curl_fetch->getContent();

        $dom->initializeDOM($contents);
    }


}
