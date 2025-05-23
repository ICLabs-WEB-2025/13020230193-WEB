@extends('admin.layouts.app')

@section('title', 'Detail Rumah')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="card shadow-lg border-0 animate__animated animate__fadeIn" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header" style="background: linear-gradient(45deg, #84fab0, #8fd3f4); color: white;">
                <h4 class="mb-0 fw-bold"><i class="bi bi-house me-2"></i>Detail Rumah</h4>
            </div>
            <div class="card-body p-4" style="background: rgba(255,255,255,0.95);">
                @if($property->image)
                    <div class="mb-4 text-center">
                        <img src="{{ asset('storage/' . $property->image) }}" class="img-fluid rounded shadow-sm transition-scale"
                             style="max-height: 300px; object-fit: cover;" alt="Property Image">
                    </div>
                @endif
                <ul class="list-group list-group-flush mb-4">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Judul:</strong>
                        <span>{{ $property->title }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Harga:</strong>
                        <span>Rp {{ number_format($property->price, 0, ',', '.') }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Alamat:</strong>
                        <span>{{ $property->address }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Status:</strong>
                        <span class="badge bg-{{ $property->status == 'available' ? 'success' : 'secondary' }} p-2">
                            {{ ucfirst($property->status == 'available' ? 'Tersedia' : 'Terjual') }}
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                        <strong>Deskripsi:</strong>
                        <span class="text-end">{{ $property->description ?? 'Tidak ada deskripsi.' }}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <strong>Dibuat Pada:</strong>
                        <span>{{ $property->created_at->format('d/m/Y H:i') }}</span>
                    </li>
                </ul>
                <div class="d-flex gap-3">
                    <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-warning btn-lg transition-btn" style="border-radius: 25px;">
                        <i class="bi bi-pencil me-2"></i>Edit
                    </a>
                    <a href="{{ route('admin.properties.index') }}" class="btn btn-outline-secondary btn-lg transition-btn" style="border-radius: 25px;">
                        <i class="bi bi-arrow-left me-2"></i>Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.transition-scale {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.transition-scale:hover {
    transform: scale(1.02);
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
.transition-btn {
    transition: all 0.3s ease;
}
.transition-btn:hover {
    transform: scale(1.05);
}
</style>
@endsection