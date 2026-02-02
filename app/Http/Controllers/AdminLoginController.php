<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminLoginController extends Controller
{
    public function showLoginForm(Request $request)
    {
        if ($request->session()->get('admin.authenticated')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required', 'string'],
            'password' => ['required', 'string'],
        ]);

        $user = config('admin.basic_user');
        $pass = config('admin.basic_pass');

        if (!$user || !$pass) {
            throw ValidationException::withMessages([
                'username' => ['Admin credentials are not configured.'],
            ]);
        }

        if ($credentials['username'] !== $user || $credentials['password'] !== $pass) {
            throw ValidationException::withMessages([
                'username' => ['These credentials do not match our records.'],
            ]);
        }

        $request->session()->regenerate();
        $request->session()->put('admin.authenticated', true);
        $request->session()->put('admin.username', $user);

        $intended = $request->session()->pull('intended', route('admin.dashboard'));
        return redirect($intended)->with('status', 'Welcome back!');
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('status', 'You have been logged out successfully.');
    }
}
