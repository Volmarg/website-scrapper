<?php

namespace App\Http\Controllers\Curl;

use App\Http\Controllers\PageContentFetch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Curl\PageHeadersFetch;

class Fetch extends Controller
{
    public $content=array(); #link and content
    public $original_headers=array(),$extraced_headers=array(); #link and headers
    public $links;
    public $test=array();

    public function __construct($links)
    {
        $this->links=$links;
    }

    public function getHeaders(){
        #point PageHeaders class
        #run this as first, then if header 200, pass finall links to getConent
        #build array of finall links in this function

        $headers_fetch=new PageHeadersFetch();

        foreach($this->links as $one_link){
            array_push($this->extraced_headers, $headers_fetch->getFinallRedirect($one_link));
        }


    }

    protected function getContent(){
        #point PageContent class
    }


}
