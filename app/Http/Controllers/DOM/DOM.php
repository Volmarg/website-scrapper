<?php

namespace App\Http\Controllers\DOM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\CountValidator\Exact;
use Wa72\HtmlPageDom\HtmlPage;
use Wa72\HtmlPageDom\HtmlPageCrawler;
use App\Http\Controllers\DOM\ContentExtractors;

/*
 |--------------------------------------------------------------------------
 | About: Wa72\HtmlPageDom\HtmlPageCrawler - some usefull methods
 |--------------------------------------------------------------------------
 |
 | Getting attribute like with jQuery: ->attr('href') or raw text as ->text();
 | Getting content from between tags like jQ ->html();
 | Example iteration over Nodes
       $extracted_data['content'][0]['dom_content']['main']->each(
            function ($element) {
               echo $element->text();
            });
 |
 |
 |
 */

class DOM extends Controller
{

    public $dom;
    public $queries = array();
    public $extracted_content = array();
    public $extracted_titles = array();


    public function __construct($request) {
        $request['querySelectorMain'] = $request['querySelectorMain'] ?? NULL;
        $request['querySelectorOther'] = $request['querySelectorOther'] ?? NULL;

        $this->query_selectors = array(
            'main' => $request['querySelectorMain'],
            'other' => $request['querySelectorOther']
        );

    }

    public function initializeDOM($content) {

        foreach ($content as $one_page) {

            $this->dom = new HtmlPage(implode($one_page['content']));
            $extractors = new ContentExtractors($this->query_selectors, $this->dom);

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
            'title' => $this->extracted_titles
        );

    }


}
