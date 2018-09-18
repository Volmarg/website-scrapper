<?php

namespace App\Http\Controllers\Helpers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContentCheckers extends Controller
{
    public static function hasLinkDomain()
    { //TODO: write function for checking if link start's with / or has a domain name in it.

    }


    public static function isContentLongEnough($content, $content_minimum_length) //This function is placed here, as by it, some pages can be skipped before further checking
    {
        echo 'aa';
    }


}
