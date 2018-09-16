<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ExtractedContentBinders extends Controller
{
    public static function bindLinks($links,$filtered_content)
    {

        for ($x = 0; $x <= count($links) - 1; $x++) {
            $filtered_content[$x]['link'] = $links[$x];
        }

        return $filtered_content;
    }

    public static function bindStatus($filtered_content, $accept_reject_statuses)
    {

        for ($x = 0; $x <= count($accept_reject_statuses) - 1; $x++) {
            $filtered_content[$x]['status'] = $accept_reject_statuses[$x];
        }

        return $filtered_content;
    }

    public static function bindKeywords($content, $keywords)
    {
        for ($x = 0; $x <= count($content) - 1; $x++) {
            $content[$x]['found_keywords'] = $keywords[$x];
        }

        return $content;
    }

    public static function bindTitles($extracted_titles,$content)
    {
        foreach ($extracted_titles as $num => $one_title) {
            $content[$num]['title'] = $one_title['title'];
        }

        return $content;
    }
}
