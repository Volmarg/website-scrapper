<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Wa72\HtmlPageDom\HtmlPage;
#INFO: REMOVE IT
class domController extends Controller
{
    /*
     * This class is used for crawling of the document body via htmlPageDom pased on domDocument
     */

    public $dom;

    public function __construct($html)
    {
        /*
         *Implode required as seems like event return array
         */

        $this->dom = new HtmlPage(implode($html));

        // filtering by query Selector works well
        $container = $this->dom->filter('#job_summary');

        //search for given matches
        # this got to be input or pre programmed matches
        $emailPattern = "#[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})#ims";
        $test = '#(.*)@(.*)#ims';
        preg_match($emailPattern, $container, $matched);

        #dd($matched);

    }

    /*
        private function findElement($selector)
        {

            return $this->dom->filter($selector);
        }
    */
    private function findPattern($args)
    {
        preg_match("#" . $args['pattern'] . "#{$args['flags']}", $args['container'], $matched);

        return $matched;
    }

    private function filterMatchedPattern()
    {

    }

}
