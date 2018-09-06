<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Curl\Fetch;
use App\Http\Controllers\DOM\DOM;
use App\Http\Controllers\Filters\Filters;

class ProcessControll extends Controller
{
    public $request,$headers,$contents,$extracted_content;

    public function __construct($request)
    {

        $this->request=$request;
    }

    public function start(){
        $curl_fetch=new Fetch($this->request['links']);
        $dom = new DOM($this->request);

        $curl_fetch->getHeaders();
        $contents=$curl_fetch->getContent();
        $this->extracted_content=$dom->initializeDOM($contents);


        $filters=new Filters($this->extracted_content,$this->request);
        $filters->filter();

    }


}
