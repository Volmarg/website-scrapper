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
        return $this->checkEachContentType($original_content);

    }

    protected function checkEachContentType($content)
    {

        $marked_content_all_pages = array();
        $marked_content_one_page = array();

        foreach ($content as $one_page_content) {
            foreach ($one_page_content['dom_content'] as $key => $type_of_content) {

                if (!empty($type_of_content)) {
                    $type_of_content = $this->checkThisContentType($type_of_content);
                    $marked_content_one_page[$key] = $type_of_content;

                }
            }

            array_push($marked_content_all_pages, $marked_content_one_page);
        }
        return $marked_content_all_pages;
    }

    protected function checkThisContentType($type_of_content)
    {
        $one_page_found_keywords = array();


        foreach ($this->keywords_to_check as $keyword_type_name => $keywords_type) {

            foreach ($keywords_type as $one_keyword) {

                if (!empty($keywords_type) && !empty($type_of_content)) {


                    $result = stristr(strip_tags($type_of_content), $one_keyword);

                    if ($result) {
                        $one_page_found_keywords[$keyword_type_name] = $one_keyword;


                        $type_of_content = $this->applyMarkers($type_of_content, $one_keyword, $keyword_type_name);


                    }

                } else {
                    $type_of_content = NULL;
                }

            }
        }
        array_push($this->all_pages_found_keywords, $one_page_found_keywords);
        return $type_of_content;

    }

    protected function applyMarkers($keyword, $content, $keyword_type_name)
    {
        return Markers::colorElement($keyword, $content, $keyword_type_name);
    }

}
