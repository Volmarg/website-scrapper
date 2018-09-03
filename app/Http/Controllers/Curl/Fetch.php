<?php

namespace App\Http\Controllers\Curl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Fetch extends Controller
{


    protected function getContent(){
        #point PageContent class
    }

    protected function getHeaders(){
        #point PageHeaders class
        #run this as first, then if header 200, pass finall links to getConent
        #build array of finall links in this function
    }
}
