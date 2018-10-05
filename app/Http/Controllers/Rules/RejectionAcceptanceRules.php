<?php

namespace App\Http\Controllers\Rules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Rules\Rejection;
use App\Http\Controllers\Rules\Acceptance;

class RejectionAcceptanceRules extends Controller
{

    public $rejection_rules, $acceptance_rules;
    public $filtered_content, $filtered_keywords;

    public function __construct($filtered_content, $filtered_keywords)
    {

        $this->rejection_rules = new Rejection();
        $this->acceptance_rules = new Acceptance();
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
        $rules_statuses = array();
        $rules_statuses['status_for_main'] = ($statuses['rejection_status']['status_for_main'] && $statuses['acceptance_status']['status_for_main'] ? 'accepted' : 'rejected');
        $rules_statuses['status_for_other'] = ($statuses['rejection_status']['status_for_other'] && $statuses['acceptance_status']['status_for_other'] ? 'accepted' : 'rejected');

        return $rules_statuses;

    }

}
