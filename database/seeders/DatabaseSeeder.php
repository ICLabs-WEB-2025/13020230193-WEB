<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $adminUser = User::where('email', 'admin@example.com')->first();

        if (!$adminUser) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            echo "Pengguna admin berhasil dibuat.\n";
        } else {
            // Jika pengguna ada, pastikan role-nya adalah 'admin'
            if ($adminUser->role !== 'admin') {
                $adminUser->update(['role' => 'admin']);
                echo "Role pengguna admin diperbarui menjadi 'admin'.\n";
            }
            echo "Pengguna admin dengan email admin@example.com sudah ada, melewati pembuatan.\n";
        }
    }
}
