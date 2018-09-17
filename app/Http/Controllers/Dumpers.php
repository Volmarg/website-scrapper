<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
                    echo $element->text();
                    echo $element->nodeName();
                });
            echo '</br>';
        }
        echo '</pre>';
    }
}
