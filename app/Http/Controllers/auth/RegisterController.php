<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function showBuyerForm()
    {
        return view('auth.register-buyer');
    }

    public function showSellerForm()
    {
        return view('auth.register-seller');
    }

    public function registerBuyer(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'buyer',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('/'); // buyer ke landing page
    }

    public function registerSeller(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => 'seller',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);
        return redirect('/admin/dashboard'); // seller ke dashboard
    }
}
