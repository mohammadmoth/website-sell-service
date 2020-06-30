<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate;
use App\Http\Controllers\Auth\Auth;

use Closure;

class freelancer extends Authenticate
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



        if (!Auth::isFreelancer())
            return redirect('\login');
        else
            return $next($request);
    }
}
