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
    static $common_style = 'weight:bold;padding:1px;display:inline-block;';
    static $rejected_style = 'border:6px red solid;';
    static $accepted_style = 'border:6px green solid;';
    static $default_style = 'border:6px blue solid;';


    public static function colorElement($content, $keyword, $keyword_type_name)
    {
        $style = self::$default_style;

        switch ($keyword_type_name) {
            case (bool)strstr($keyword_type_name, 'reject'):
                $style = self::$rejected_style;
                break;
            case (bool)strstr($keyword_type_name, 'accept'):
                $style = self::$accepted_style;
                break;

        }

        return str_ireplace($keyword, "<span style='" . $style . "'>" . $keyword . "</span>", $content);

    }

    public static function init_styles()
    {
        self::$rejected_style .= self::$common_style;
        self::$accepted_style .= self::$common_style;
        self::$default_style .= self::$common_style;
    }
}

$m = new Markers();
$m::init_styles();