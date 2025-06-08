<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function view(){
        return view('auth.auth-login-basic');
    }

    // Function para sa pag login ng user hehe, obvious ba sa name ng function? :D
    public function login(Request $request)
    {
    // Validate credentials
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $remember = $request->has('remember');

        $user = \App\Models\User::where('email', $credentials['email'])->first();

        if (!$user) {
            return back()->withErrors(['email' => 'User not found'])->onlyInput('email');
        }

        // if (!$user->is_active) {
        //     return back()->withErrors(['email' => 'User is not active'])->onlyInput('email');
        // }

        if (!auth()->attempt($credentials, $remember)) {
            return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
        }

        $request->session()->regenerate();
        session(['user_role' => $user->role]);

        return redirect()->intended('/dashboard');
    }


    // Function para sa pag logout ng user hehe, obvious ba sa name ng function? :D
    public function logout(Request $request)
    {
        // Log the user out
        auth()->logout();
        // Invalidate the session para di na magamit ang session sa ibang request
        $request->session()->invalidate();
        // Regenerate the CSRF token para di na magamit ang old token sa ibang request
        $request->session()->regenerateToken();
        // Return a successful response
        return redirect()->route('login')->with('status', 'You have been logged out successfully.');
    }
}