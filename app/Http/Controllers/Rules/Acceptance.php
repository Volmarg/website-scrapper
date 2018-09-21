<?php

namespace App\Http\Controllers\Rules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\RulesHelpers;

class Acceptance extends Controller
{
    use RulesHelpers;

    protected function hasNoRejectableKeywords()
    {
        return array(
            'status_for_main' => (!isset($found_keywords['main_reject']) ? true : false),
            'status_for_other' => (!isset($found_keywords['other_reject']) ? true : false)
        );

    }


    public function checkAcceptance($found_keywords)
    {
        $no_rejection = $this->hasNoRejectableKeywords($found_keywords);
        $all_statuses_foreach_rule = compact('no_rejection');

        $statuses_summary_foreach_source = $this->checkStatusesForAllSources($all_statuses_foreach_rule);
        return $statuses_summary_foreach_source;
    }
}
