<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Tampilkan hanya buyer dan seller
        $users = User::whereIn('role', ['buyer', 'seller'])->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users',
            'role'     => 'required|in:buyer,seller',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        // Jangan izinkan admin utama diedit
        if ($user->email === 'admin@example.com') {
            return redirect()->route('admin.users.index')->withErrors(['error' => 'Akun admin utama tidak bisa diubah.']);
        }

        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // Lindungi admin utama
        if ($user->email === 'admin@example.com') {
            return redirect()->route('admin.users.index')->withErrors(['error' => 'Akun admin utama tidak bisa diubah.']);
        }

        $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'role'     => 'required|in:buyer,seller',
            'password' => 'nullable|min:6|confirmed',
        ]);

        $user->update([
            'name'     => $request->name,
            'email'    => $request->email,
            'role'     => $request->role,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        // Lindungi admin utama dari penghapusan
        if ($user->email === 'admin@example.com') {
            return redirect()->route('admin.users.index')->withErrors(['error' => 'Akun admin utama tidak bisa dihapus.']);
        }

        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'Pengguna berhasil dihapus.');
    }
}
