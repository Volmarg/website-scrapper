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

    public $links_to_crawl;
    public $subpage;

    /* Process IDEA

    - build all pagination links,
    - fetch full content foreach one pagination link
    - filter each content by given keywords (main ca be used for fetching link )

    */



#TODO: check WHY it seems like DOM lib fetches sometimes few occurences of QuerySelector but it seems like it takes content from other page.
    public $pagination_data = '';

    public function __construct()
    {
        $this->subpage = new Subpages();
        $this->pagination_data = DummyData::formInput();
    }

    public function startGrabbingPagination()
    {

        #Get all pagers content
        $links = $this->buildPagersLinks();
        $pagination_content = $this->subpage->fetchEachPageContent($links);

        #get all pagers filtered contents
        $dom = new DOM($this->pagination_data);
        $extracted_pagination_data = $dom->initializeDOM($pagination_content);

        Dumpers::iterateOverHtmlNodeElements($extracted_pagination_data);
        dd($extracted_pagination_data);

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
