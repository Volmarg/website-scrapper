<?php

namespace App\Http\Controllers\Filters;
#fix this namespace !!

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Filters\Filters;

class Keywords extends Controller
{

    public $found_rejected_keywords = array(), $found_accepted_keywords = array();
    public $keywords_to_check = array();

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
        $this->checkEachContentType($original_content);

    }

    protected function checkEachContentType($content)
    {

        foreach ($content as $one_page_content) {
            foreach ($one_page_content as $key => $type_of_content) {

                if (!empty($type_of_content)) {
                    $this->checkThisContentType($type_of_content);

                }
            }

        }
    
        #test
        die();
    }

    protected function checkThisContentType($type_of_content)
    { //make it more flexible so it would check all KW types at once

        foreach ($this->keywords_to_check as $keyword_type_name => $keywords_type) {
            foreach ($keywords_type as $one_keyword) {

                if (!empty($keywords_type) && !empty($type_of_content)) {

                    $result = stristr($type_of_content, $one_keyword);
                    if ($result) {
                        $type_of_content = $this->applyMarkers($type_of_content, $one_keyword,$keyword_type_name);
                        array_push($this->found_accepted_keywords, $one_keyword);
                    }

                } else {
                    #add here adding info about empty content
                }

            }
        }


        #tests
        echo $type_of_content;

    }

    protected function applyMarkers($keyword, $content,$keyword_type_name)
    {
        #change it to be more elastic according to changes required in checkThisContentType
        return Markers::colorElement($keyword, $content,$keyword_type_name);
    }

}
