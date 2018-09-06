<?php
/**
 * Created by PhpStorm.
 * User: Volmarg Reiso
 * Date: 06.09.2018
 * Time: 05:41
 */

namespace App\Http\Controllers\Filters;


class Markers
{
    #This class is used for marking found keywords in case user would like to display text with found keywords

    private $rejected_style='border:2px red solid';
    private $accepted_style='border:2px green solid';
    static $test_style='border:2px blue solid';

    public static function colorElement($keyword,$content){
        #consider using preg_ to color all KW on page
        return str_replace($keyword,"<span style='".self::$test_style."'>".$keyword."</span>",$content);

    }
}