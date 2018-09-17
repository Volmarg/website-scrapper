<?php

namespace App\Http\Controllers\Pagination;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Curl\Fetch;
use App\Http\Controllers\DOM\DOM;

class Pagination extends Controller
{


    /* Process IDEA

    - build all pagination links,
    - fetch full content foreach one pagination link
    - filter each content by given keywords (main ca be used for fetching link )

    */
#TODO: check WHY it seems like DOM lib fetches sometimes few occurences of QuerySelector but it seems like it takes content from other page.




    public $pagination_data = '';

    public function dummyData()
    {
        return array(
            'link' => 'https://de.indeed.com/Jobs?q=php&l=berlin&start={!pagination!}',
            'startPage' => '0',
            'endPage' => '2',
            'pageInterator' => '10',
            'pagesPattern' => '{!pagination!}',
            'querySelectorMain' => array('a.jobtitle'), #
            'querySelectorOther' => ''
        );
    }


    public function startPagination()
    {

        $this->pagination_data = $this->dummyData();

        #Get all pagers content
        $links = $this->buildPagersLinks();
     echo '<pre>';
     var_dump($links);
     echo '</pre>';
        $contents = $this->fetchEachPageContent($links);

     echo '<pre>';
     var_dump($contents);
     echo '</pre>';
        #get all pagers filtered contents
        $dom = new DOM($this->pagination_data);
        #BUG: Process wont' move further from this place - fix it and refractor the code at 1st
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
