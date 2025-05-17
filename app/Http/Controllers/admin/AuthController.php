<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Tampilkan form login
    public function showLoginForm()
    {
        // Jika sudah login (berdasarkan session kustom), redirect ke dashboard
        if (session()->has('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.auth.login');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Akun admin hardcoded
        $hardcodedEmail = 'admin@example.com';
        $hardcodedPassword = 'password'; // plain text (tidak aman, hanya untuk demo)

        if ($request->email === $hardcodedEmail && $request->password === $hardcodedPassword) {
            // Simulasikan login dengan session manual
            session(['admin_logged_in' => true]);
            return redirect()->route('admin.dashboard');
        }

        return back()->withErrors(['email' => 'Email atau password salah.']);
    }

    // Logout
    public function logout(Request $request)
    {
        session()->forget('admin_logged_in');
        return redirect()->route('login');
    }
}
