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
    public $queries = array();
    public $extracted_content = array();
    public $extracted_titles = array();

    public function __construct($request)
    {
        $this->query_selectors = array(
            'main' => $request['querySelectorMain'],
            'other' => $request['querySelectorOther']
        );

    }

    public function initializeDOM($content)
    {

        foreach ($content as $one_page) {

            $this->dom = new HtmlPage(implode($one_page['content']));
            $extractors = new ContentExtractors($this->query_selectors, $this->dom);

            #TODO: change this return array, since no array in array is required now
            array_push($this->extracted_content,
                array(
                    'dom_content' => array(
                        'main' => $extractors->mainQuerySelector(),
                        'other' => $extractors->otherQuerySelector(),
                    ),
                ));

            array_push($this->extracted_titles, array('title' => $extractors->titleExtraction()));
        }


        return array(
            'content' => $this->extracted_content,
            'title' => $this->extracted_titles # TODO: got to think about this element, maybe it should be optional via param, as its not required and breaks purpose of class a bit
        );

    }


}
