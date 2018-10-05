<?php

namespace App\Http\Controllers\Curl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\CurlContentEvent;

class PageContentFetch extends Controller
{
    protected function savePageConent(){

    }

    public function getContent($link){

        $content=event(new CurlContentEvent($link));

        return $content;
    }

}
