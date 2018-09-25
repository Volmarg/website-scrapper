<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Curl\Fetch;
use App\Http\Controllers\DOM\DOM;
use App\Http\Controllers\Filters\Filters;
use App\Http\Controllers\Rules\RejectionAcceptanceRules;
use App\Http\Controllers\Output;
use App\Http\Controllers\Helpers\ExtractedContentBinders;

class ProcessControll extends Controller //TODO: change this class/filename
{
    #TODO: Remove remaining old Listeners/Events from curl

    public $request, $headers, $contents, $extracted_content, $extracted_titles;
    public $filtered_keywords, $filtered_content, $accept_reject_statuses;

    public function __construct($request) { # TODO, got to think about constructor in terms of pagination scrapper - what data will be passed in

        $this->request = $request;
    }

    public function start() {

        $this->fetchContentDataAndHeaders();
        $this->applyFiltersOnContent();
        $this->isContentRejectedAccepted();
        $this->rebindExtractedContent();

        $output = new Output($this->filtered_content);
        $output->renderOutput();
    }


    private function rebindExtractedContent() {
        $this->filtered_content = ExtractedContentBinders::bindLinks($this->request['links'], $this->filtered_content);
        $this->filtered_content = ExtractedContentBinders::bindStatus($this->filtered_content, $this->accept_reject_statuses);
        $this->filtered_content = ExtractedContentBinders::bindKeywords($this->filtered_content, $this->filtered_keywords);
        $this->filtered_content = ExtractedContentBinders::bindTitles($this->extracted_titles, $this->filtered_content);

    }

    protected function applyFiltersOnContent() {
        $filters = new Filters($this->extracted_content, $this->request);
        $filters_result = $filters->filter();
        $this->filtered_content = $filters_result['filtered_content'];
        $this->filtered_keywords = $filters_result['keywords'];

    }

    protected function fetchContentDataAndHeaders() {

        $curl_fetch = new Fetch($this->request['links']);
        $dom = new DOM($this->request);

        $curl_fetch->getHeaders();
        $contents = $curl_fetch->getContent();

        $extracted_data = $dom->initializeDOM($contents);
        $this->extracted_content = $extracted_data['content'];
        $this->extracted_titles = $extracted_data['title'];
    }

    protected function isContentRejectedAccepted() {
        $rejection_acceptance_rules = new RejectionAcceptanceRules($this->filtered_content, $this->filtered_keywords);
        $this->accept_reject_statuses = $rejection_acceptance_rules->apply();

    }
}
