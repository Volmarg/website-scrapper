<?php

namespace App\Http\Controllers\Curl;

use App\Http\Controllers\Curl\PageContentFetch;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Curl\PageHeadersFetch;
use App\Http\Controllers\Helpers\ContentCheckers;

class Fetch extends Controller
{
    public $content = array(); #link and content
    public $original_headers = array(), $extraced_headers = array(); #link and headers
    public $links;
    public $extracted_contents = array();
    public $min_content_len = '';

    public function __construct($links, $minimum_content_length = '')
    {
        $this->links = $links;
        $this->min_content_len = $minimum_content_length;
    }

    #TODO: make this two protected and set into one class as Headers need to be run, for Content Fetch but not required seperately
    public function getHeaders()
    {
        #point PageHeaders class
        #run this as first, then if header 200, pass finall links to getConent
        #build array of finall links in this function

        $headers_fetch = new PageHeadersFetch();

        foreach ($this->links as $one_link) {
            array_push($this->extraced_headers, $headers_fetch->getFinallRedirect($one_link));
        }

        return $this->extraced_headers;

    }

    public function getContent()
    {

        $content_fetch = new PageContentFetch();
        foreach ($this->extraced_headers as $one_page) {

            array_push($this->extracted_contents, array('content' => $content_fetch->getContent($one_page['target_link']), 'link' => $one_page['target_link']));
        }


        return $this->extracted_contents;
    }

    public function getPageData()
    {
        $this->getHeaders();
        return $this->getContent();
    }


    protected function shouldContentBeChecked()
    {
        if(!empty($this->min_content_len)){
            ContentCheckers::isContentLongEnough($this->extracted_content, $this->min_content_len);
        }

        return true;
    }


}
