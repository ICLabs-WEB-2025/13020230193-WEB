@extends('admin.layouts.app')

@section('title', 'Data Rumah')

@section('content')
<div class="container py-4">
    <h2 class="mb-4"><i class="bi bi-building me-2"></i>Daftar Rumah</h2>

    <a href="{{ route('admin.properties.create') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle me-2"></i>Tambah Rumah
    </a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Judul</th>
                        <th>Harga</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($properties as $property)
                        <tr>
                            <td>{{ $property->title }}</td>
                            <td>Rp {{ number_format($property->price, 0, ',', '.') }}</td>
                            <td>{{ $property->address }}</td>
                            <td>
                                <span class="badge bg-{{ $property->status == 'available' ? 'success' : 'secondary' }}">
                                    {{ ucfirst($property->status == 'available' ? 'Tersedia' : 'Terjual') }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.properties.show', $property->id) }}"
                                   class="btn btn-info btn-sm" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('admin.properties.edit', $property->id) }}"
                                   class="btn btn-warning btn-sm" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('admin.properties.destroy', $property->id) }}"
                                      method="POST" class="d-inline delete-form"
                                      onsubmit="return confirm('Yakin ingin menghapus rumah ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data rumah.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <!-- Pagination Links -->
            <div class="d-flex justify-content-center">
                {{ $properties->links() }}
            </div>
        </div>
    </div>
</div>
@endsection