<?php

namespace App\Http\Controllers\Filters;
#fix this namespace !!

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Filters\Filters;

class Keywords extends Controller
{
#BUG: there is a bug somewhere that causes each page to have the same set of found/rejected KW
    public $keywords_to_check = array();
    public $all_pages_found_keywords = array();

    public function __construct($request)
    {
        $this->keywords_to_check = array(
            'main_accept' => $request['acceptKeywordsBody'],
            'main_reject' => $request['rejectKeywordsBody'],
            'other_accept' => $request['acceptKeywordsOther'],
            'other_reject' => $request['rejectKeywordsOther']
        );


    }

    public function searchKeywords($original_content)
    {

        return $this->checkAllScannedPages($original_content);

    }

    protected function checkAllScannedPages($content)
    {

        $marked_content_all_pages = array();
        $marked_content_one_page = array();
        $found_keywords_one_page = array();
        $found_keywords_all_pages = array();


        foreach ($content as $one_page_content) {
            foreach ($one_page_content['dom_content'] as $content_selector_name => $content_for_selector) {

                if (!empty($content_for_selector)) {
                    $one_page_scan_result = $this->checkOneScannedPage($content_for_selector, $content_selector_name);

                    $marked_content_one_page[$content_selector_name] = $one_page_scan_result['one_page_marked_content'];
                    foreach ($one_page_scan_result['one_page_found_keywords'] as $keywords_selector_name => $one_selector_found_keywords) {

                        $found_keywords_one_page[$keywords_selector_name] = $one_selector_found_keywords;
                    }
                }

            }

            array_push($marked_content_all_pages, $marked_content_one_page);
            array_push($found_keywords_all_pages, $found_keywords_one_page);
            $marked_content_one_page = array();
            $found_keywords_one_page = array();
        }
        return compact('marked_content_all_pages', 'found_keywords_all_pages');
    }

    protected function checkOneScannedPage($content_for_selector, $content_selector_name)
    {


        $one_page_found_keywords = array();

        foreach ($this->keywords_to_check as $keyword_selector_name => $keywords_for_selector) {
            foreach ($keywords_for_selector as $one_keyword) {

                if (strstr($keyword_selector_name, $content_selector_name)) {

                    if (!empty($keywords_for_selector) && !empty($content_for_selector)) {

                        $result = stristr(strip_tags($content_for_selector), $one_keyword);

                        if ($result) {

                            if (!isset($one_page_found_keywords[$keyword_selector_name])) {
                                $one_page_found_keywords[$keyword_selector_name] = array();
                            }
                            array_push($one_page_found_keywords[$keyword_selector_name], $one_keyword);

                            $content_for_selector = $this->applyMarkers($content_for_selector, $one_keyword, $keyword_selector_name);

                        } else {
                            $content_for_selector = $content_for_selector;
                        }

                    } else {
                        $content_for_selector = $content_for_selector;
                    }
                }
            }
        }

        $one_page_marked_content = $content_for_selector;
        return compact('one_page_found_keywords', 'one_page_marked_content');

    }

    protected function applyMarkers($keyword, $content, $keyword_type_name)
    {
        return Markers::colorElement($keyword, $content, $keyword_type_name);
    }

}
