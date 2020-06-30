<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\Auth\Auth ;

use Closure;

class admin extends Authenticate
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$guards)
    {



        if (!Auth::isadmin() )
            return redirect('\login');
            else
            return $next($request);
    }
}
