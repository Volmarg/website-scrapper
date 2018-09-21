<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

trait RulesHelpers
{

    public function checkStatusesForAllSources($all_statuses_foreach_rule)
    {
        $statuses_summary_foreach_source = array();

        foreach ($all_statuses_foreach_rule as $rule_name => $one_status_source) {
            foreach ($one_status_source as $content_type_name => $status) {

                if (!isset($statuses_summary_foreach_source[$content_type_name])) {
                    $statuses_summary_foreach_source[$content_type_name] = $status;
                } else {
                    if ($statuses_summary_foreach_source[$content_type_name] === true && $status === false) {
                        $statuses_summary_foreach_source[$content_type_name] = $status;
                    }
                }

            }
        }

        return $statuses_summary_foreach_source;
    }


}
