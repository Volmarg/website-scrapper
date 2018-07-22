<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wa72\HtmlPageDom\HtmlPage;

class domController extends Controller
{
    public $dom;

    public function __construct($html)
    {

        $this->dom = new HtmlPage($html);
    }

    public function findElement()
    {

        // from hasContent
        $querySelector = 'title';
        $content=$this->dom->getBody()->html();
        #echo $content;

// output the whole HTML page
       # echo $this->dom->save();


    }
}
