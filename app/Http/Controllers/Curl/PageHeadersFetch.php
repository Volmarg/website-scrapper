<?php

namespace App\Http\Controllers\Curl;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Events\GetHeaderEvent;

class PageHeadersFetch extends Controller
{

    protected function extractHeaders($headers)
    {
        $location = '';
        $location_lock = false;

        $header_code = '';
        $header_lock = false;

        $array_reverse = array_reverse($headers[0]);

        foreach ($array_reverse as $num => $one_header) {

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
            }

            if ($header_lock && $location_lock) {
                break;
            }

        }

        return array(
            'code' => $header_code,
            'location' => $location
        );
    }

    public function getFinallRedirect($link)
    {

        $extracted_headers = $this->extractHeaders(event(new GetHeaderEvent($link)));

        return array(
            'original_link' => $link,
            'target_link' => (empty($extracted_headers['location']) ? $link : $extracted_headers['location']),
            'code' => $extracted_headers['code']
        );


    }

}
