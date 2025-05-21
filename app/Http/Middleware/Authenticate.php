<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request)
    {
        if (!$request->expectsJson()) {
            // Debugging untuk memastikan middleware auth berfungsi
            dd('Middleware Auth: Autentikasi gagal', Auth::check(), Auth::user() ? Auth::user()->role : 'No user');
            return route('login');
        }
    }
}
