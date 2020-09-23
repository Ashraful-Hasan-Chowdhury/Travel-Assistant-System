<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfHotelmanager
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = 'hotelmanager')
    {
        if (Auth::guard($guard)->check()) {
            return redirect()->route('hotelmanager.dashboard');
        }

        return $next($request);
    }

}
