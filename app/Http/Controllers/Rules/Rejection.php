<?php

namespace App\Http\Controllers\Rules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Helpers\RulesHelpers;

class Rejection extends Controller
{
    use RulesHelpers;

    #info - for any future extension, this can be more flexible by creating func. that will buil nammes for array elements

    protected function hasNoAcceptableKeywords($found_keywords)
    {
        return array(
            'status_for_main' => (!isset($found_keywords['main_accept']) ? false : true),
            'status_for_other' => (!isset($found_keywords['other_accept']) ? false : true),
        );
    }

    protected function hasNoKeywordsAtAll($found_keywords)
    {
        return array(
            'status_for_main' => (empty($found_keywords) && !isset($found_keywords['main_accept']) && !isset($found_keywords['main_reject']) ? false : true),
            'status_for_other' => (empty($found_keywords) && !isset($found_keywords['other_accept']) && !isset($found_keywords['other_reject']) ? false : true),
        );

    }

    protected function hasRejectionKeywords($found_keywords)
    {

        return array(
            'status_for_main' => (isset ($found_keywords['main_reject']) ? false : true),
            'status_for_other' => (isset ($found_keywords['other_reject']) ? false : true),
        );
    }

    public function checkRejection($found_keywords)
    {

        $no_accept = $this->hasNoAcceptableKeywords($found_keywords);
        $no_keywords = $this->hasNoKeywordsAtAll($found_keywords);
        $has_rejection = $this->hasRejectionKeywords($found_keywords);
        $all_statuses_foreach_rule = compact('no_accept', 'no_keywords', 'has_rejection');
        #dump($all_statuses_foreach_rule);

        $statuses_summary_foreach_source = $this->checkStatusesForAllSources($all_statuses_foreach_rule);

        return $statuses_summary_foreach_source;
    }
}

