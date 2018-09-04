<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Curl\Fetch;

class ProcessControll extends Controller
{
    public $request;

    public function __construct($request)
    {

        $this->request=$request;
    }

    public function start(){
        $curl_fetch=new Fetch($this->request['links']);
        $curl_fetch->getHeaders();
    }


}
