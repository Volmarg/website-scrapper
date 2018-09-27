<?php

namespace App\Http\Controllers\Pagination;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Curl\Fetch;
use App\Http\Controllers\DummyData;
use App\Http\Controllers\SingleLinksScrapper;


class Subpages extends Controller
{


    public function extractSubpageLinkFromEachMatch($single_node) {

        $link_to_subpage = ($single_node->nodeName() != 'a' ? $single_node->filter('a')->attr('href') : $single_node->attr('href'));
        return $link_to_subpage;

    }

    public function scrapSingleLinks($links_to_crawl) {
        $fake_request = DummyData::singleLinksForm($links_to_crawl);
        $single_links = new SingleLinksScrapper($fake_request);
        $single_links->scrapLinks();
    }
}
