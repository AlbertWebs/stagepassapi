<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminProfileController extends Controller
{
    public function edit()
    {
        return view('admin.profile', [
            'sectionKey' => 'profile',
            'username' => config('admin.basic_user'),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'basic_user' => ['required', 'string', 'max:191'],
            'basic_pass' => ['nullable', 'string', 'max:191'],
        ]);

        $envPath = base_path('.env');
        if (!File::exists($envPath)) {
            return back()->with('error', 'Environment file not found.');
        }

        $env = File::get($envPath);
        $env = $this->setEnvValue($env, 'ADMIN_BASIC_USER', $data['basic_user']);
        if (!empty($data['basic_pass'])) {
            $env = $this->setEnvValue($env, 'ADMIN_BASIC_PASS', $data['basic_pass']);
        }

        File::put($envPath, $env);

        return back()->with('status', 'Admin credentials updated. Re-authentication required.');
    }

    private function setEnvValue(string $env, string $key, string $value): string
    {
        $escaped = str_replace('"', '\"', $value);
        $line = $key . '="' . $escaped . '"';
        $pattern = "/^{$key}=.*$/m";

        if (preg_match($pattern, $env)) {
            return preg_replace($pattern, $line, $env);
        }

        return rtrim($env) . PHP_EOL . $line . PHP_EOL;
    }
}
