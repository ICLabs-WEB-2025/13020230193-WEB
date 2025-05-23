@extends('admin.layouts.app')

@section('title', 'Data Rumah')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <h2 class="mb-4 fw-bold text-dark animate__animated animate__fadeInDown">
            <i class="bi bi-building me-2"></i>Daftar Rumah
        </h2>

        <a href="{{ route('admin.properties.create') }}" class="btn btn-success mb-4 btn-lg transition-btn" style="border-radius: 25px;">
            <i class="bi bi-plus-circle me-2"></i>Tambah Rumah
        </a>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show animate__animated animate__fadeIn" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show animate__animated animate__fadeIn" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card shadow-lg border-0" style="border-radius: 15px; overflow: hidden;">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead style="background: linear-gradient(45deg, #2c3e50, #3498db); color: white;">
                            <tr>
                                <th class="ps-4">Judul</th>
                                <th>Harga</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th class="pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($properties as $property)
                                <tr class="transition-scale">
                                    <td class="ps-4">{{ $property->title }}</td>
                                    <td>Rp {{ number_format($property->price, 0, ',', '.') }}</td>
                                    <td>{{ $property->address }}</td>
                                    <td>
                                        <span class="badge bg-{{ $property->status == 'available' ? 'success' : 'secondary' }} p-2">
                                            {{ ucfirst($property->status == 'available' ? 'Tersedia' : 'Terjual') }}
                                        </span>
                                    </td>
                                    <td class="pe-4">
                                        <a href="{{ route('admin.properties.show', $property->id) }}"
                                           class="btn btn-info btn-sm transition-btn" title="Detail">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.properties.edit', $property->id) }}"
                                           class="btn btn-warning btn-sm transition-btn" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.properties.destroy', $property->id) }}"
                                              method="POST" class="d-inline delete-form"
                                              onsubmit="return confirm('Yakin ingin menghapus rumah ini?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm transition-btn" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">Tidak ada data rumah.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination Links -->
                <div class="p-3">
                    {{ $properties->links('pagination::bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.transition-scale {
    transition: transform 0.3s ease, background 0.3s ease;
}
.transition-scale:hover {
    background: rgba(0,0,0,0.05);
    transform: translateY(-2px);
}
.transition-btn {
    transition: all 0.3s ease;
}
.transition-btn:hover {
    transform: scale(1.1);
}
</style>
@endsection