<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class DashboardController extends Controller
{
    public function index()
    {
        
        dd('DashboardController: index dipanggil', Auth::check(), Auth::user() ? Auth::user()->role : 'No user');

        return view('admin.dashboard.index');
    }
}
