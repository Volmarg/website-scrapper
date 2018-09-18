<?php

namespace App\Http\Controllers\Pagination;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Curl\Fetch;


class Subpages extends Controller
{


    public function extractSubpageLinkFromEachMatch($single_node)
    {

        $link_to_subpage = ($single_node->nodeName() != 'a' ? $single_node->filter('a')->attr('href') : $single_node->attr('href'));
        return $link_to_subpage;

    }
}
