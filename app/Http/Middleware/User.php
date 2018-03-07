<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth; // ADDING AUTH CLASS //

class User
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
        if(Auth::check()){ /* CHECK IF USER IS LOGGED IN */
            return $next($request);
        }else{
            return abort(404,'You have to log in');
        }
    }
}
