<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {

            # Check if guard is authenticated
            if (Auth::guard($guard)->check()) {

                # Admin
                if ($guard === 'admin' && Route::is('admin.*')) {
                    return redirect()->route('admin.dashboard');
                }

                # Customer
                elseif ($guard === 'customer' && Route::is('customer.*')) {
                    return redirect()->route('customer.dashboard');
                }

                # Normal User
                else {
                    return redirect()->route('home');
                }
            }
        }

        return $next($request);
    }
}