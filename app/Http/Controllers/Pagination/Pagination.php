<?php

namespace App\Http\Controllers\Pagination;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Curl\Fetch;
use App\Http\Controllers\DOM\DOM;

class Pagination extends Controller
{

    public $pagination_data = '';

    public function dummyData()
    {
        return array(
            'link' => 'https://de.indeed.com/Jobs?q=php&l=berlin&start={!pagination!}',
            'startPage' => '0',
            'endPage' => '10',
            'pageInterator' => '10',
            'pagesPattern' => '{!pagination!}',
            'querySelectorBody' => '.jobtitle turnstileLink', #TODO: after refractor at DOM, change this to que...Selec..Main as well
            'querySelectorOther' => ''
        );
    }


    public function startPagination()
    {

        $this->pagination_data = $this->dummyData();

        #Get all pagers content
        $links = $this->buildPagersLinks();
        $contents = $this->fetchEachPageContent($links);

        #get all pagers filtered contents
        $dom = new DOM($this->pagination_data);
        #BUG: Process wont' move further from this place
        $extracted_data = $dom->initializeDOM($contents);

        dd($extracted_data);
    }


#Move this functions to the DOM/Fetch etc - it's onl for tests here
    public function fetchEachPageContent($links)
    {
        $curl_fetch = new Fetch($links);
        $curl_fetch->getHeaders();
        return $curl_fetch->getContent();
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
