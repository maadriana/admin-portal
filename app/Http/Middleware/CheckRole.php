<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $userRole = auth()->user()->role;

        // Check if user has any of the required roles
        if (in_array($userRole, $roles)) {
            return $next($request);
        }

        // Redirect with error if user doesn't have required role
        return redirect()->back()->with('error', 'You do not have permission to access this resource.');
    }
}
