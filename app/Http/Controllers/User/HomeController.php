<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Property;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::where('status', 'available')->latest()->take(6)->get(); // tampilkan properti terbaru
        return view('user.home.index', compact('properties'));
    }
}
