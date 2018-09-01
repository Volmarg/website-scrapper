<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\domController;

class hasContent
{

    /*
     *
     * This middleware should check if the given content on page passes sets of rules as for example
     * length, keywords, etc. If given rules wont be passed then for example
     * skip printing output for this page or dont insert data into DB
     *
     */

    public function handle($request, Closure $next,$role)
    {


        return $next($request);
    }

    public function checkContent($content){

        $args['strLen']=1000;       #function parameter - content length
        $args['techStack']=array('Laravel','PHP'); #function parameter = unwanted tech
        $args['content']=$content; #function parameter holding fetched content.




    }
}
