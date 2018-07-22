<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wa72\HtmlPageDom\HtmlPage;

class domController extends Controller
{
    /*
     * This class is used for crawling of the document body via htmlPageDom pased on domDocument
     */

    public $dom;

    public function __construct($html)
    {

        $this->dom = new HtmlPage($html);
    }

    public function findElement()
    {

        // from hasContent
        $querySelector = 'title';
        $content = $this->dom->getBody()->html();


        return $content;


    }
}
