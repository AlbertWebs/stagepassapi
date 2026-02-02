<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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
        try {
            $credentials = $request->validate([
                'username' => ['required', 'string'],
                'password' => ['required', 'string'],
            ]);

            $user = config('admin.basic_user');
            $pass = config('admin.basic_pass');

            if (!$user || !$pass) {
                return back()
                    ->withErrors(['username' => 'Admin credentials are not configured. Please check your .env file.'])
                    ->withInput($request->only('username'));
            }

            if ($credentials['username'] !== $user || $credentials['password'] !== $pass) {
                return back()
                    ->withErrors(['username' => 'These credentials do not match our records.'])
                    ->withInput($request->only('username'));
            }

            $request->session()->regenerate();
            $request->session()->put('admin.authenticated', true);
            $request->session()->put('admin.username', $user);

            $intended = $request->session()->pull('intended', route('admin.dashboard'));
            return redirect($intended)->with('status', 'Welcome back!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->route('admin.login')
                ->withErrors($e->errors())
                ->withInput($request->only('username'));
        } catch (\Exception $e) {
            \Log::error('Admin login error: ' . $e->getMessage());
            return redirect()->route('admin.login')
                ->withErrors(['username' => 'An error occurred during login. Please try again.'])
                ->withInput($request->only('username'));
        }
    }

    public function logout(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('admin.login')->with('status', 'You have been logged out successfully.');
    }
}
