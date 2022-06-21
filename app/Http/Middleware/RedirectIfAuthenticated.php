<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use App\Services\Auth as AuthService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if (AuthService::user()->isMedic()) {
                    return redirect()->route('medic.dashboard');
                } else {
                    return redirect()->route('dashboard');
                }
            }
        }

        return $next($request);
    }
}
