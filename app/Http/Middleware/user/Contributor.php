<?php

namespace App\Http\Middleware\user;

use Closure;
use Auth;

class Contributor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::user()->role == 1){
            return $next($request);
        }
        return rediretct('/');
    }
}
