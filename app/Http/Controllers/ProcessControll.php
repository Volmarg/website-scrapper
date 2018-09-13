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
    #TODO: Remove remaining old Listeners/Events from curl

    public $request, $headers, $contents, $extracted_content, $extracted_titles;

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

        $extracted_data = $dom->initializeDOM($contents);
        $this->extracted_content = $extracted_data['content'];
        $this->extracted_titles = $extracted_data['title'];

        $filters = new Filters($this->extracted_content, $this->request);
        $filters_result = $filters->filter();


        $filtered_content = $filters_result['filtered_content'];
        $filtered_keywords = $filters_result['keywords'];


        $filtered_content = $this->bindLinks($filtered_content);

        $rejection_acceptance_rules = new RejectionAcceptanceRules($filtered_content, $filtered_keywords);
        $accept_reject_statuses = $rejection_acceptance_rules->apply();


        #TODO: make one function Rebinder and add all bindings into it, think about other class maybe? Can I move upper binder below too?
        $filtered_content = $this->bindStatus($filtered_content, $accept_reject_statuses);
        $filtered_content = $this->bindKeywords($filtered_content, $filtered_keywords->all_pages_found_keywords);

        $filtered_content = $this->bindTitles($filtered_content);

        $output = new Output($filtered_content);
        $output->renderOutput();
    }

    private function bindLinks($filtered_content)
    {

        for ($x = 0; $x <= count($this->request['links']) - 1; $x++) {
            $filtered_content[$x]['link'] = $this->request['links'][$x];
        }

        return $filtered_content;
    }

    private function bindStatus($filtered_content, $accept_reject_statuses)
    {

        for ($x = 0; $x <= count($accept_reject_statuses) - 1; $x++) {
            $filtered_content[$x]['status'] = $accept_reject_statuses[$x];
        }

        return $filtered_content;
    }

    private function bindKeywords($content, $keywords)
    {
        for ($x = 0; $x <= count($content) - 1; $x++) {
            #TODO - make found array for EACH content page, at this moment each page will have the same array, but just making this func. flex.
            $content[$x]['found_keywords'] = $keywords[$x];
        }

        return $content;
    }

    private function bindTitles($content)
    {
        foreach ($this->extracted_titles as $num => $one_title) {
            $content[$num]['title'] = $one_title['title'];
        }

        return $content;
    }
}
