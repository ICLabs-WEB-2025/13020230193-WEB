<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (in_array(Auth::user()->role, ['admin', 'seller'])) {
            return $next($request);
        }

        return redirect('/')->with('error', 'Akses ditolak. Hanya admin atau seller yang diizinkan.');
    }
}
