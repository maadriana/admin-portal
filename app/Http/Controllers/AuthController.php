<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function view()
    {
        // If user is already authenticated, redirect to dashboard
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view('auth.auth-login-basic');
    }

    public function login(Request $request)
    {
        // Validate credentials
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->has('remember');

        // Check if user exists
        $user = User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found'])->onlyInput('email');
        }

        // Check if user is active (uncomment if needed)
        // if (!$user->is_active) {
        //     return back()->withErrors(['email' => 'User is not active'])->onlyInput('email');
        // }

        // Attempt authentication
        if (!Auth::attempt($credentials, $remember)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
        }

        // Regenerate session for security
        $request->session()->regenerate();

        // Store user role in session
        session(['user_role' => $user->role]);

        // Redirect to intended page or dashboard
        return redirect()->intended(route('dashboard'));
    }

    public function logout(Request $request)
    {
        // Log the user out
        Auth::logout();

        // Invalidate the session
        $request->session()->invalidate();

        // Regenerate the CSRF token
        $request->session()->regenerateToken();

        // Clear the user_role from session
        $request->session()->forget('user_role');

        // Return with success message
        return redirect()->route('login')->with('status', 'You have been logged out successfully.');
    }
}
