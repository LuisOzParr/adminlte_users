<?php

namespace Ozparr\AdminLogin\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RolByLvl
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param $lvl integer
     * @return mixed
     */
    public function handle($request, Closure $next, $lvl)
    {
        if(Auth::user()->rol->nivel <= $lvl){
            return $next($request);
        }
        else
        {
            abort(401);
        }
    }
}
