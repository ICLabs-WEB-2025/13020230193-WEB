<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        $sellers = User::where('role', 'seller')->get();
        return view('admin.properties.create', compact('sellers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'status' => 'required|in:available,sold',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'user_id',
            'title',
            'price',
            'description',
            'address',
            'status'
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images/properties', 'public');
        }

        Property::create($data);

        return redirect()->route('admin.properties.index')->with('success', 'Properti berhasil ditambahkan.');
    }

    public function show(Property $property)
    {
        return view('admin.properties.show', compact('property'));
    }

    public function edit(Property $property)
    {
        $sellers = User::where('role', 'seller')->get();
        return view('admin.properties.edit', compact('property', 'sellers'));
    }

    public function update(Request $request, Property $property)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'title' => 'required|string',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'address' => 'required|string',
            'status' => 'required|in:available,sold',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = $request->only([
            'user_id',
            'title',
            'price',
            'description',
            'address',
            'status'
        ]);

        // Jika ada gambar baru diupload
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($property->image) {
                Storage::disk('public')->delete($property->image);
            }

            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('images/properties', 'public');
        }

        $property->update($data);

        return redirect()->route('admin.properties.index')->with('success', 'Properti berhasil diperbarui.');
    }

    public function destroy(Property $property)
    {
        if ($property->image) {
            Storage::disk('public')->delete($property->image);
        }

        $property->delete();

        return redirect()->route('admin.properties.index')->with('success', 'Properti berhasil dihapus.');
    }
}
