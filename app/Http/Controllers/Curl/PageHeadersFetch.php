<?php

namespace App\Http\Controllers\Curl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\CurlHeaderEvent;

class PageHeadersFetch extends Controller
{



    protected function extractCode($headers){

        $code_regex="#HTTP/1\.1 ([0-9]+)#";
        preg_match($code_regex,$headers[0],$code_match);
        return $code_match[1];
    }

    protected function extractLink($headers){
        $link_regex="@^Location:(.*)<br />@Usmi";
        preg_match($link_regex,nl2br($headers[0]),$link_match);
        return trim($link_match[1]);
    }

    protected function isPageRedirected($code=null){
        #checking header status - pass only if 200 ok
        if($code=="200" || $code==200){
            return  true;
        }else{
            return false;
        }
    }

    public function getFinallRedirect($link){
        #Geting content of each one target page untill we get header 200
        $original_link=$link;
        $code=$this->extractCode(event(new CurlHeaderEvent($link)));

        while(!$this->isPageRedirected($code)){
            $link=$this->extractLink(event(new CurlHeaderEvent($link)));
            $code=$this->extractCode(event(new CurlHeaderEvent($link)));
        }

        return array(
            'original_link'=>$original_link,
            'target_link'=>$link
        );

    }
}
