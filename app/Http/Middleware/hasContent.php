<?php

namespace App\Http\Middleware;

use Closure;

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
        $this->checkContent($role);
        return $next($request);
    }

    public function checkContent(){

    }
}
