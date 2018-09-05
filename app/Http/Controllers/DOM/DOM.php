<?php

namespace App\Http\Controllers\DOM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Wa72\HtmlPageDom\HtmlPage;
use Wa72\HtmlPageDom\HtmlPageCrawler;

class DOM extends Controller
{

    public $dom;

    public function initializeDOM($content){

        foreach($content as $one_page){

            $this->dom=new HtmlPage(implode($one_page['content']));
            $this->mainQuerySelector('title');

        }

    }

    protected function mainQuerySelector($selector){
        #pass user inserted query to this function

     $content=$this->dom->filter($selector);
     echo $content;

    }


}
