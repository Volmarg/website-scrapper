<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\domController;

class hasContent
{

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
