<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Property;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Menampilkan daftar rumah yang tersedia dengan opsi pencarian, filter, dan pengurutan.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Property::query();

        // Pencarian berdasarkan judul atau alamat
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('address', 'like', "%{$search}%");
            });
        }

        // Filter berdasarkan status
        if ($request->has('status') && in_array($request->status, ['available', 'sold'])) {
            $query->where('status', $request->status);
        } else {
            // Default: Hanya tampilkan status 'available' jika tidak ada filter
            $query->where('status', 'available');
        }

        // Pengurutan
        if ($request->has('sort')) {
            if ($request->sort == 'price_asc') {
                $query->orderBy('price', 'asc');
            } elseif ($request->sort == 'price_desc') {
                $query->orderBy('price', 'desc');
            }
        } else {
            // Default: Urutkan berdasarkan terbaru
            $query->latest();
        }

        $properties = $query->paginate(9); // 9 rumah per halaman

        return view('user.properties.index', compact('properties'));
    }

    /**
     * Menampilkan detail rumah berdasarkan ID.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        // Mengambil properti dengan pengecekan tambahan
        $property = Property::findOrFail($id);

        // Memastikan properti valid sebelum dikembalikan ke view
        if (!$property || !$property->price) {
            abort(404, 'Properti tidak ditemukan atau data tidak lengkap.');
        }

        return view('user.properties.show', compact('property'));
    }
}
