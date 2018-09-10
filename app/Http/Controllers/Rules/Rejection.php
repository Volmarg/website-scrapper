<?php

namespace App\Http\Controllers\Rules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Rejection extends Controller
{

    protected function hasNoAcceptableKeywords($found_keywords)
    {
        return (!isset($found_keywords['main_accept']) ? true : false);

    }

    protected function hasNoKeywordsAtAll($found_keywords)
    {
        return (empty($found_keywords) ? true : false);
    }

    protected function hasRejectionKeywords($found_keywords)
    {
        return (isset ($found_keywords['main_reject']) ? true : false);
    }

    public function checkRejection($found_keywords)
    {
        $no_accept = $this->hasNoAcceptableKeywords($found_keywords);
        $no_keywords = $this->hasNoKeywordsAtAll($found_keywords);
        $has_rejection = $this->hasRejectionKeywords($found_keywords);

        return ($no_accept || $no_keywords || $has_rejection ? true : false);
    }
}

