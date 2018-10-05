<?php

namespace App\Http\Controllers\DOM;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentExtractors extends Controller
{
    public $query_selectors, $dom;

    public function __construct($query_selectors, $dom) {
        $this->query_selectors = $query_selectors;
        $this->dom = $dom;
    }

    public function mainQuerySelector() {
        if (!empty($this->query_selectors['main'][0])) {
            return $this->dom->filter($this->query_selectors['main'][0]);
        }

    }

    public function otherQuerySelector() {
        if (!empty($this->query_selectors['other'][0])) {
            return $this->dom->filter($this->query_selectors['other'][0]);
        }
    }

    public function titleExtraction() {
        return strip_tags($this->dom->filter('title'));
    }
}
