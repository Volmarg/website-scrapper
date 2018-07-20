<?php

namespace App\Http\Middleware;

use Closure;
use App\Http\Controllers\domController;

class hasContent
{



    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$role)
    {
        $dom=new domController($role);
        $content=$dom->findElement();

        $this->checkContent($content);

        return $next($request);
    }

    public function checkContent($content){

        $args['strLen']=1000;       #function parameter - content length
        $args['techStack']=array('Laravel','PHP'); #function parameter = unwanted tech
        $args['content']=$content; #function parameter holding fetched content.




    }
}
