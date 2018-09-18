<?php

namespace App\Http\Controllers\Rules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class Acceptance extends Controller
{
    protected function hasNoRejectableKeywords()
    {
        return (!isset($found_keywords['main_reject']) ? true : false);
    }


    public function checkAcceptance($found_keywords)
    {
        $no_rejection = $this->hasNoRejectableKeywords($found_keywords);

        return ($no_rejection ? true : false);
    }
}
