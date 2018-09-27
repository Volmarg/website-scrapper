<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
 |--------------------------------------------------------------------------
 | Only for testing purposes - will be removed later
 |--------------------------------------------------------------------------
*/


class DummyData extends Controller
{
    public static $domain = '';

    public static function paginationFormPart() {

        return array(
            'links' => array(''),
            'startPage' => '0',
            'endPage' => '5',
            'pageIterator' => '10',
            'pagesPattern' => '{!pagination!}',
            'querySelectorMain' => array(''),
            'querySelectorOther' => ''
        );
        /*
         * links -> array of links // textarea
         * startPage -> one value // input numeric
         * endPage -> one Value //input numeric
         * pageIterator -> one Value //input numeric
         * pagesPattern -> one value // input string
         * querySelectorMain -> one value //input string
         * querySelectorOther -> one value //input string
         */
    }

    public static function singleLinksForm($links) {
        return array(
            'acceptKeywordsBody' => array(''),
            'acceptKeywordsOther' => array(''),
            'rejectKeywordsBody' => array(''),
            'rejectKeywordsOther' => array(''),
            'querySelectorMain' => array(''),
            'querySelectorOther' => array(''),
            'links' => $links,
        );

    }
}
