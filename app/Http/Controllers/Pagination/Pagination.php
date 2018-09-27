<?php

namespace App\Http\Controllers\Pagination;

use App\Http\Controllers\Dumpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Curl\Fetch;
use App\Http\Controllers\DOM\DOM;
use App\Http\Controllers\DummyData;
use App\Http\Controllers\Pagination\Subpages;
use App\Http\Controllers\ProcessControll;
use App\Http\Controllers\SingleLinksScrapper;

class Pagination extends Controller
{

    /* Process IDEA

    - build all pagination links,
    - fetch full content foreach one pagination link
    - filter each content by given keywords (main ca be used for fetching link )

    */

    public $links_to_crawl = array();
    public $subpage;
    public $pagination_data = '', $domain = '';
    public $paginations_request='';
    public $single_link_request='';
    public $request;

    public function __construct(Request $request) {
        $this->request=$request;
        $this->subpage = new Subpages();
        $this->pagination_data = DummyData::paginationFormPart();
        $this->domain = DummyData::$domain; #TODO: use link construction checker - this is hardcoded atm.
    }

    public function startGrabbingPagination() {

        dd($this->request);

        $pagers_links = $this->buildPagersLinks();
        $curl_fetch = new Fetch($pagers_links);

        $dom = new DOM($this->pagination_data);
        $extracted_pagination_content = $dom->initializeDOM($curl_fetch->getPageData());
        $this->getAllFoundSubpagesLinks($extracted_pagination_content);
        $this->subpage->scrapSingleLinks($this->links_to_crawl);



        echo '<h3>All found subpages links</h3>'; #TODO:remove this
        dump($this->links_to_crawl);
        echo '<h3> All extracted content from subpages </h3>';


    }

    protected function rebuildRequest(){

    }

    protected function getAllFoundSubpagesLinks($extracted_data) {
        for ($x = 0; $x <= count($extracted_data['content']) - 1; $x++) {
            $extracted_data['content'][$x]['dom_content']['main']->each(
                function ($element, $num) {
                    array_push($this->links_to_crawl, $this->domain . $this->subpage->extractSubpageLinkFromEachMatch($element));
                });
        }
    }

    private function buildPagersLinks() {
        $rebuilded_links = array();

        foreach ($this->pagination_data['links'] as $one_pagination_link) {
            $multiply = 1; #INFO: this should be dynamic?

            for ($x = $this->pagination_data['startPage']; $x <= $this->pagination_data['endPage']; $x++) {
                array_push($rebuilded_links, $this->buildOnePagerLink($multiply, $one_pagination_link));
                $multiply++;
            }

        }

        return $rebuilded_links;
    }

    private function buildOnePagerLink($multiply = false, $one_pagination_link = false) {

        if (!(bool)$multiply) {
            $page_num = $this->pagination_data['startPage'];
        } else {
            $page_num = (int)$this->pagination_data['startPage'] + (int)$this->pagination_data['pageIterator'] * $multiply;
        }

        return trim(str_replace($this->pagination_data['pagesPattern'], $page_num, $one_pagination_link));
    }


}
