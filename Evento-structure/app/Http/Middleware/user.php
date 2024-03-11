<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class user
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if(Auth::check() && Auth::user()->role === 'user' || Auth::user()->role === 'organisateur'){
            if(Auth::user()->access === 'blocked'){
                return response('Access denied', 403);
            }
            else {
                return $next($request);
            }
    }
    elseif(Auth::check() && Auth::user()->role === 'admin'){
        return redirect()->route('dashboard');
    }
    else{
        return redirect()->route('organisateur');
    }
    }
}
