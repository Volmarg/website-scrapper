<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\curlingEvent;
use App\Http\Controllers\domController;

class curl extends Controller
{

    public $content;

    public function __construct()
    {
        $this->content=$this->getContent();
    }

    public function getContent()
    {
        #get content of the page via curling event, and pass it to public var so it can be used
        #by middleware or inside this class

        $url = 'https://www.indeed.nl/vacature-bekijken?jk=c33fcd6ba68cf3f3&from=myjobs&tk=1cjp24o429sgtek0';
        return event(new curlingEvent(curl_init(), $url));


    }

    public function showContent()
    {

        #This part is only for tests
        #$dom=new domController($this->content);
        #$pageContent=$dom->findElement();
       #$matchedContent = $dom->findElement();


    }
}
