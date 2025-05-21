<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Hardcoded login untuk admin sementara
        if (
            $credentials['email'] === 'admin@example.com' &&
            $credentials['password'] === 'admin'
        ) {
            $user = User::where('email', 'admin@example.com')->first();

            if (!$user) {
                $user = User::create([
                    'name' => 'Admin',
                    'email' => 'admin@example.com',
                    'password' => Hash::make('admin'),
                    'role' => 'admin',
                ]);
            } elseif ($user->role !== 'admin') {
                $user->update(['role' => 'admin']);
            }

            Auth::login($user);

            return redirect('/admin/dashboard');
        }

        // Validasi untuk login biasa
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return back()->withErrors(['email' => 'Email atau password salah.']);
        }

        Auth::login($user);

        if ($user->role === 'admin' || $user->role === 'seller') {
            return redirect('/admin/dashboard');
        } elseif ($user->role === 'buyer') {
            return redirect('/');
        }

        Auth::logout();
        return redirect('/login')->withErrors(['email' => 'Role tidak valid.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/login');
    }
}
