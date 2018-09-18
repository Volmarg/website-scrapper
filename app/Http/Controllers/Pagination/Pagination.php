<?php

namespace App\Http\Controllers\Pagination;

use App\Http\Controllers\Dumpers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Curl\Fetch;
use App\Http\Controllers\DOM\DOM;
use App\Http\Controllers\DummyData;
use App\Http\Controllers\Pagination\Subpages;

class Pagination extends Controller
{

    /* Process IDEA

    - build all pagination links,
    - fetch full content foreach one pagination link
    - filter each content by given keywords (main ca be used for fetching link )

    */

    public $links_to_crawl=array();
    public $subpage;
    public $pagination_data = '', $domain = '';

    public function __construct()
    {
        $this->subpage = new Subpages();
        $this->pagination_data = DummyData::formInput();
        $this->domain = DummyData::$domain; #TODO: use link construction checker - this is hardcoded atm.
    }

    public function startGrabbingPagination()
    {

        $pagers_links = $this->buildPagersLinks();
        $curl_fetch = new Fetch($pagers_links);

        $dom = new DOM($this->pagination_data);
        $extracted_pagination_content = $dom->initializeDOM($curl_fetch->getPageData());
        $this->checkEachSubpageContent($extracted_pagination_content);

        echo '<h3>All found subpages links</h3>'; #TODO:remove this
        dump($this->links_to_crawl);

    }

    protected function checkEachSubpageContent($extracted_pagination_content)
    {
        #TODO: try to reuse functions from ProcessControll somehow
        $this->getAllFoundSubpagesLinks($extracted_pagination_content);
    }

    protected function getAllFoundSubpagesLinks($extracted_data)
    {
        for ($x = 0; $x <= count($extracted_data['content']) - 1; $x++) {
            $extracted_data['content'][$x]['dom_content']['main']->each(
                function ($element, $num) {
                    array_push($this->links_to_crawl, $this->domain . $this->subpage->extractSubpageLinkFromEachMatch($element));
                });
        }
    }

    private function buildPagersLinks()
    {
        $rebuilded_links = array();
        $multiply = 1;

        array_push($rebuilded_links, $this->buildOnePagerLink()); #INFO: there might be problem with pager number calculation - keep that in mind
        for ($x = $this->pagination_data['startPage']; $x <= $this->pagination_data['endPage']; $x++) {
            array_push($rebuilded_links, $this->buildOnePagerLink($multiply));
            $multiply++;
        }
        return $rebuilded_links;
    }

    private function buildOnePagerLink($multiply = false)
    {

        if (!(bool)$multiply) {
            $page_num = $this->pagination_data['startPage'];
        } else {
            $page_num = (int)$this->pagination_data['startPage'] + (int)$this->pagination_data['pageInterator'] * $multiply;
        }

        return trim(str_replace($this->pagination_data['pagesPattern'], $page_num, $this->pagination_data['link']));
    }


}
