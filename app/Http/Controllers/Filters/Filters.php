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
        $this->keywords = new Keywords($request);
        $this->original_content = $content;
        $this->request = $request;
    }

    public function filter()
    {
        $filtered_content = $this->filterByKeywords();

        return array(
            'filtered_content' => $filtered_content,
            'keywords' => $this->keywords
        );
    }

    protected function filterByKeywords()
    {
        return $this->keywords->searchKeywords($this->original_content);


    }
}
