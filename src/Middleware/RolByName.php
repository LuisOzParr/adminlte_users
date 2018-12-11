<?php

namespace Ozparr\AdminlteUsers\Middleware;

use App\Rol;
use Closure;
use Illuminate\Support\Facades\Auth;
use function PHPSTORM_META\type;

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
        try{
            $rol = \Ozparr\AdminlteUsers\Models\Rol::where('nombre','=',$rol)->firstOrFail();
        }
        catch (\Exception $e){
            abort(500);
        }

        if(Auth::user()->rol->nivel <= $rol->nivel ){
            return $next($request);
        }
        else
        {
            abort(401);
        }
    }
}
