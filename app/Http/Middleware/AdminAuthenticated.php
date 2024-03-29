<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session as SessionSession;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()) {
                return $next($request);
            }
            Auth::logout();
            return redirect('/login');
        }
        return redirect('/login');
    }
}
