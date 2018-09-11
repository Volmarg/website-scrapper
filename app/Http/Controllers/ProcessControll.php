<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Curl\Fetch;
use App\Http\Controllers\DOM\DOM;
use App\Http\Controllers\Filters\Filters;
use App\Http\Controllers\Rules\RejectionAcceptanceRules;
use App\Http\Controllers\Output;

class ProcessControll extends Controller
{
    public $request, $headers, $contents, $extracted_content;

    public function __construct($request)
    {

        $this->request = $request;
    }

    public function start()
    {
        $curl_fetch = new Fetch($this->request['links']);
        $dom = new DOM($this->request);

        $curl_fetch->getHeaders();
        $contents = $curl_fetch->getContent();
        $this->extracted_content = $dom->initializeDOM($contents);

        $filters = new Filters($this->extracted_content, $this->request);
        $filters_result = $filters->filter();

        $filtered_content = $filters_result['filtered_content'];
        $filtered_keywords = $filters_result['keywords'];

        $filtered_content = $this->bindLinks($filtered_content);

        $rejection_acceptance_rules = new RejectionAcceptanceRules($filtered_content, $filtered_keywords);
        $accept_reject_statuses = $rejection_acceptance_rules->apply();

        $filtered_content = $this->bindStatus($filtered_content, $accept_reject_statuses);


        $output = new Output($filtered_content);
        $output->renderOutput();
    }

    protected function bindLinks($filtered_content)
    {

        for ($x = 0; $x <= count($this->request['links']) - 1; $x++) {
            $filtered_content[$x]['link'] = $this->request['links'][$x];
        }

        return $filtered_content;
    }

    protected function bindStatus($filtered_content, $accept_reject_statuses)
    {

        for ($x = 0; $x <= count($accept_reject_statuses) - 1; $x++) {
            $filtered_content[$x]['status'] = $accept_reject_statuses[$x];
        }

        return $filtered_content;
    }


}
