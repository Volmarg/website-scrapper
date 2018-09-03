<?php

namespace App\Http\Controllers\Curl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageHeadersFetch extends Controller
{


    public function isPageRedirected(){
        #checking header status - pass only if 200 ok
    }

    protected function getFinallRedirect(){
        #Geting content of each one target page untill we get header 200
    }
}
