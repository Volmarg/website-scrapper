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
    public static $domain = 'https://de.indeed.com';

    public static function formInput()
    {

        return array(
            'link' => 'https://de.indeed.com/Jobs?q=php&l=berlin&start={!pagination!}',
            'startPage' => '0',
            'endPage' => '0',
            'pageInterator' => '10',
            'pagesPattern' => '{!pagination!}',
            'querySelectorMain' => array('a.jobtitle, h2.jobtitle'),
            'querySelectorOther' => ''
        );
    }
}
