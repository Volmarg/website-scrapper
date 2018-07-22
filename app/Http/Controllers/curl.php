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
        #$this->middleware('hasContent:' . $this->content);
    }

    public function getContent()
    {
        #get content of the page via curling event, and pass it to public var so it can be used
        #by middleware or inside this class

        $url = 'https://laracasts.com/discuss/channels/general-discussion/pass-data-from-listener-to-event';
        return event(new curlingEvent(curl_init(), $url));
    }

    public function showContent()
    {

        #This part is only for tests
        #$dom=new domController($this->content);
        #$matchedContent = $dom->findElement();

        dd($this->content);
    }
}
