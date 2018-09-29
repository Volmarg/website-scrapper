<?php

namespace App\Http\Controllers\Curl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\GetHeaderEvent;

class PageHeadersFetch extends Controller
{

    public function extractHeaders($headers) {
        $location = '';
        $location_lock = false;

        $header_code = '';
        $header_lock = false;

        $domain_name = '';
        $domain_lock = false;

        $array_reverse = array_reverse($headers[0]);

        foreach ($array_reverse as $num => $one_header) {


            if (strstr($one_header, 'Domain')) { #Info: temporary fix - for unknown reason: same switch case doesnt work - check later
                if (!$location_lock) {
                    preg_match('#Domain=(.*)\;#U', $one_header, $matched_domain);
                    $domain_name = (isset($matched_domain[1]) ? (substr($matched_domain[1], 0, 1) == '.' ? 'https://'.substr($matched_domain[1], 1) : $matched_domain[1]) : null);
                    $domain_lock = true;
                }
            }

            switch ($one_header) {
                case (bool)strstr($one_header, 'Location'):
                    if (!$location_lock) {
                        $location = trim(str_replace('Location:', '', $array_reverse[$num]));
                        $location_lock = true;
                    }
                    break;

                case strstr($one_header, 'HTTP/1.1'):
                    if (!$header_lock) {
                        $header_code = $array_reverse[$num];
                        $header_lock = true;
                    }
                    break;

                case strstr($one_header, 'Domain'): #info: this is the strange case where switch case is not working as it should;
                    if (!$domain_lock) {
                        $domain_name = 'test';
                        $domain_lock = true;
                    }
                    break;
            }

            if ($header_lock && $location_lock && $domain_lock) {
                break;
            }

        }

        return array(
            'code' => $header_code,
            'location' => $location,
            'domain' => $domain_name
        );
    }

    public function getFinallRedirect($link) {

        $extracted_headers = $this->extractHeaders(event(new GetHeaderEvent($link)));

        return array(
            'original_link' => $link,
            'target_link' => (empty($extracted_headers['location']) ? $link : $extracted_headers['location']),
            'code' => $extracted_headers['code']
        );


    }

}
