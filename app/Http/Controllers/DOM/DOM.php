<?php

namespace App\Http\Controllers\DOM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\CountValidator\Exact;
use Wa72\HtmlPageDom\HtmlPage;
use Wa72\HtmlPageDom\HtmlPageCrawler;
use App\Http\Controllers\DOM\ContentExtractors;

class DOM extends Controller
{

    public $dom;
    public $queries=array();
    public $extracted_content=array();

    public function __construct($request)
    {
        $this->query_selectors=array(
            'main'=>$request['querySelectorBody'],
            'other'=>$request['querySelectorOther']
        );

    }

    public function initializeDOM($content){

        foreach($content as $one_page){

            $this->dom=new HtmlPage(implode($one_page['content']));
            $extractors=new ContentExtractors($this->query_selectors,$this->dom);

            array_push($this->extracted_content,
                array(
                 'main'=>$extractors->mainQuerySelector(),
                 'other'=>$extractors->otherQuerySelector(),
                 'title'=>$extractors->titleExtraction(),
                     ));
        }

        return $this->extracted_content;

    }



}
