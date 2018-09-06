<?php

namespace App\Http\Controllers\Filters;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Filters\Keywords;

class Filters extends Controller
{
    public $keywords,$original_content,$request;

    public function __construct($content,$request)
    {
        $this->keywords=new Keywords($request);
        $this->original_content=$content;
        $this->request=$request;
    }

    public function filter(){
        $this->filterByKeywords();
    }

    protected function filterByKeywords(){
        $this->keywords->searchKeywords($this->original_content);

    }
}