<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Pagination\Subpages;
#INFO: REMOVE IT
/*
 |--------------------------------------------------------------------------
 | Only for testing purposes - will be removed later
 |--------------------------------------------------------------------------
*/

class Dumpers extends Controller
{
    public static function pre_VarDump($data)
    {
        echo '<pre>';
        var_dump($data);
        echo '</pre>';
    }

    public static function iterateOverHtmlNodeElements($extracted_data)
    {

        //iterating over Documents Nodes
        echo '<pre>';
        for ($x = 0; $x <= count($extracted_data['content']) - 1; $x++) {
            $extracted_data['content'][$x]['dom_content']['main']->each(
                function ($element) {

                    $s = new Subpages();
                    echo DummyData::$domain.$s->extractLinksFromEachFetchedNode($element);
                    echo '</br>';
                });
            echo '</br>';
        }
        echo '</pre>';
    }
}
