<?php

namespace App\Http\Controllers\Rules;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Rules\Rejection;
use App\Http\Controllers\Rules\Acceptance;
use App\Http\Controllers\Rules\Manual;

class RejectionAcceptanceRules extends Controller
{

    public $rejection_rules, $acceptance_rules, $manual_action_rules;
    public $filtered_content, $filtered_keywords;

    public function __construct($filtered_content, $filtered_keywords)
    {
        $this->rejection_rules = new Rejection();
        $this->acceptance_rules = new Acceptance();
        $this->manual_action_rules = new Manual();

        $this->filtered_content = $filtered_content;
        $this->filtered_keywords = $filtered_keywords->found_keywords;
    }


    public function apply()
    {

        $rules_statuses = array();
        for ($x = 0; $x <= count($this->filtered_content) - 1; $x++) {
            $rejection_status = $this->rejection_rules->checkRejection($this->filtered_keywords);
            $acceptance_status = $this->acceptance_rules->checkAcceptance($this->filtered_keywords);

            array_push($rules_statuses, $this->checkFinalStatus($rejection_status, $acceptance_status));
        }


        return $rules_statuses;

    }

    private function checkFinalStatus($rejection_status, $acceptance_status)
    {
        return ($acceptance_status && !$rejection_status ? 'accepted' : 'rejected');
    }
}
