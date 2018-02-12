<?php

namespace Ozparr\AdminLogin\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RolByName
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rol)
    {
        $roles = explode(';',$rol);
        if(Auth::user()->areRol($roles)){
            return $next($request);
        }
        else
        {
            abort(401);
        }
    }
}
