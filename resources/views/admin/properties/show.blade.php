@extends('admin.layouts.app')

@section('title', 'Detail Rumah')

@section('content')
<div class="container py-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0"><i class="bi bi-house me-2"></i>Detail Rumah</h4>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush mb-3">
                <li class="list-group-item">
                    <strong>Judul:</strong> {{ $property->title }}
                </li>
                <li class="list-group-item">
                    <strong>Harga:</strong> Rp {{ number_format($property->price, 0, ',', '.') }}
                </li>
                <li class="list-group-item">
                    <strong>Alamat:</strong> {{ $property->address }}
                </li>
                <li class="list-group-item">
                    <strong>Status:</strong>
                    <span class="badge bg-{{ $property->status == 'available' ? 'success' : 'secondary' }}">
                        {{ ucfirst($property->status == 'available' ? 'Tersedia' : 'Terjual') }}
                    </span>
                </li>
                <li class="list-group-item">
                    <strong>Deskripsi:</strong>
                    {{ $property->description ?? 'Tidak ada deskripsi.' }}
                </li>
                <li class="list-group-item">
                    <strong>Dibuat Pada:</strong> {{ $property->created_at->format('d/m/Y H:i') }}
                </li>
            </ul>

            <div class="d-flex gap-2">
                <a href="{{ route('admin.properties.edit', $property->id) }}" class="btn btn-warning">
                    <i class="bi bi-pencil me-2"></i>Edit
                </a>
                <a href="{{ route('admin.properties.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>
</div>
@endsection