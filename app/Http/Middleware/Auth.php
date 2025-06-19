<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            // If not authenticated, redirect to the login page
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        // Optional: Check if user is active
        // if (!Auth::user()->is_active) {
        //     Auth::logout();
        //     return redirect()->route('login')->with('error', 'Your account is not active.');
        // }

        return $next($request);
    }
}
