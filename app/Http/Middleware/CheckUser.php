<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUser
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
        if(Auth::check()){
            if(Auth::user()->role == 1){
                return redirect('/contributor');
            } else if(Auth::user()->role == 2){
                return redirect('/admin');
            }    
        return $next($request);
        }
        return $next($request);
    }
}
