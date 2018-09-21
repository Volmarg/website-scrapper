<?php

namespace App\Http\Controllers\Filters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Filters\Keywords;

class Filters extends Controller
{
    public $keywords, $original_content, $request;

    public function __construct($content, $request)
    {
        $this->keywords = new Keywords($request); #1>>
        $this->original_content = $content;
        $this->request = $request;
    }

    public function filter()
    {

        $pages_filtering_data = $this->filterByKeywords();
        return array(
            'filtered_content' => $pages_filtering_data['marked_content_all_pages'],
            'keywords' => $pages_filtering_data['found_keywords_all_pages']
        );
    }

    protected function filterByKeywords()
    {
        #Ciekawy case - odrazu przerzuca te wartosci do this keywords #1>>
        return $this->keywords->searchKeywords($this->original_content);


    }
}
