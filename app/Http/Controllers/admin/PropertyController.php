<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::orderBy('created_at', 'desc')->paginate(10); // ✅ PAGINATE
        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('admin.properties.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'status' => 'required|in:available,sold',
        ]);

        Property::create($request->all());

        return redirect()->route('admin.properties.index')->with('success', 'Properti berhasil ditambahkan.');
    }

    public function show(Property $property)
    {
        return view('admin.properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        return view('admin.properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'status' => 'required|in:available,sold',
        ]);

        $property->update($request->all());

        return redirect()->route('admin.properties.index')->with('success', 'Properti berhasil diperbarui.');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties.index')->with('success', 'Properti berhasil dihapus.');
    }
}
