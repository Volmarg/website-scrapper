<?php

namespace App\Http\Controllers\Filters; #fix this namespace !!

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Filters\Filters;

class Keywords extends Controller
{

    public $rejectable_keywords_main,$acceptable_keywords_main;
    public $rejectable_keywords_other,$acceptable_keywords_other;
    public $found_rejected_keywords=array(),$found_accepted_keywords=array();

    public function __construct($request)
    {
        #make this one array of keywords
        $this->acceptable_keywords_main=$request['acceptKeywordsBody'];
        $this->rejectable_keywords_main=$request['rejectKeywordsBody'];

        $this->acceptable_keywords_other=$request['acceptKeywordsOther'];
        $this->rejectable_keywords_other=$request['rejectKeywordsOther'];
    }

    public function searchKeywords($original_content){
        $this->checkEachContentType($original_content);

    }

    protected function checkEachContentType($content){
        #here comes array of arrays of contents from each page
        #so first we brake array to each separate page
        #then we brake it into types of content from inputs

        foreach($content as $one_page_content){

            foreach($one_page_content as $key=>$type_of_content){
                if(!empty($type_of_content)){
                    $this->checkThisContentType($type_of_content);
                }
            }

        }
    }

    protected function checkThisContentType($type_of_content){ //make it more flexible so it would check all KW types at once

        if(!empty($this->acceptable_keywords_main) && !empty($type_of_content)){
            foreach($this->acceptable_keywords_main as $one_keyword){



                $result=strstr($type_of_content,$one_keyword);
                if($result){
                    $type_of_content=$this->applyMarkers($one_keyword,$type_of_content);
                    array_push($this->found_accepted_keywords,$one_keyword);
                }



            }
            #tests
            echo $type_of_content;
            die();
        }

    }

    protected function applyMarkers($keyword,$content){
        #change it to be more elastic according to changes required in checkThisContentType
        return Markers::colorElement($keyword,$content);
    }

}
