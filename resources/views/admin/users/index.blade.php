@extends('admin.layouts.app')

@section('title', 'Data Pengguna')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <h2 class="mb-4 fw-bold text-dark animate__animated animate__fadeInDown">
            <i class="bi bi-person me-2"></i>Daftar Pengguna
        </h2>

        <a href="{{ route('admin.users.create') }}" class="btn btn-success mb-4 btn-lg transition-btn" style="border-radius: 25px;">
            <i class="bi bi-plus-circle me-2"></i>Tambah Pengguna
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
                                <th class="ps-4">Nama</th>
                                <th>Email</th>
                                <th>Peran</th>
                                <th class="pe-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($users as $user)
                                <tr class="transition-scale">
                                    <td class="ps-4">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        <span class="badge bg-{{ $user->role == 'buyer' ? 'primary' : 'warning' }} p-2">
                                            {{ ucfirst($user->role == 'buyer' ? 'Pembeli' : 'Penjual') }}
                                        </span>
                                    </td>
                                    <td class="pe-4">
                                        <a href="{{ route('admin.users.edit', $user->id) }}"
                                           class="btn btn-warning btn-sm transition-btn" title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}"
                                              method="POST" class="d-inline delete-form"
                                              onsubmit="return confirm('Yakin ingin menghapus pengguna ini?')">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm transition-btn" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted py-4">Tidak ada data pengguna.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- Pagination Links -->
                <div class="p-3">
                    {{ $users->links('pagination::bootstrap-5') }}
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