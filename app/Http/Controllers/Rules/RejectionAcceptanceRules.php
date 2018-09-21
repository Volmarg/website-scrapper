<?php

namespace App\Http\Controllers\Rules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Rules\Rejection;
use App\Http\Controllers\Rules\Acceptance;
use App\Http\Controllers\Rules\Manual;

class RejectionAcceptanceRules extends Controller
{

    #BUG: There is still something messing up, since pages that should be accepted are getting rejeceted etc but displaying statuses for both types works

    public $rejection_rules, $acceptance_rules, $manual_action_rules;
    public $filtered_content, $filtered_keywords;

    public function __construct($filtered_content, $filtered_keywords)
    {
        #BUG : something is now wrong again since there are 2x more keywords than scanned pages, that;s good cuz it checks for Other content now but rules are wrong cuz of that;

        $this->rejection_rules = new Rejection();
        $this->acceptance_rules = new Acceptance();
        $this->manual_action_rules = new Manual();
        $this->filtered_content = $filtered_content;
        $this->filtered_keywords = $filtered_keywords;
    }


    public function apply()
    {

        $rules_statuses = array();
        for ($x = 0; $x <= count($this->filtered_content) - 1; $x++) {

            $rejection_status = $this->rejection_rules->checkRejection($this->filtered_keywords[$x]);
            $acceptance_status = $this->acceptance_rules->checkAcceptance($this->filtered_keywords[$x]);

            array_push($rules_statuses, $this->checkFinalStatus(compact('rejection_status', 'acceptance_status')));
        }

        return $rules_statuses;

    }

    private function checkFinalStatus($statuses)
    {

        #Info: I know, this is hardcoded, I don't need other solution here, and it would take time to make extraction mechanisms - might come back to this upon extensions

        $rules_statuses = array();
        $rules_statuses['status_for_main'] = ($statuses['rejection_status']['status_for_main'] && $statuses['acceptance_status']['status_for_main'] ? 'accepted' : 'rejected');
        $rules_statuses['status_for_other'] = ($statuses['rejection_status']['status_for_other'] && $statuses['acceptance_status']['status_for_other'] ? 'accepted' : 'rejected');

        return $rules_statuses;

    }

}
