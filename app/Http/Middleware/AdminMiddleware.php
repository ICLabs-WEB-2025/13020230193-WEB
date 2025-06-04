<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            Log::info('Unauthenticated access attempt to admin route', ['path' => $request->path()]);
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        if (in_array(Auth::user()->role, ['admin', 'seller'])) {
            return $next($request);
        }

        Log::warning('Unauthorized access attempt to admin route', [
            'user_id' => Auth::user()->id,
            'role' => Auth::user()->role,
            'path' => $request->path()
        ]);
        return redirect()->route('user.home')->with('error', 'Akses ditolak. Hanya admin atau seller yang diizinkan.');
    }
}
