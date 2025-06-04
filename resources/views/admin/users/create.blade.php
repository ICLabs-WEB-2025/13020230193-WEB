@extends('admin.layouts.app')

@section('title', 'Tambah Pengguna')

@section('content')
<div class="container-fluid py-5" style="background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); min-height: 100vh;">
    <div class="container">
        <div class="card shadow-lg border-0 animate__animated animate__fadeIn" style="border-radius: 20px; overflow: hidden; max-width: 600px; margin: auto;">
            <div class="card-header" style="background: linear-gradient(45deg, #2B2A4C, #4B3F72); color: #fff;">
                <h4 class="mb-0 fw-bold"><i class="bi bi-person-plus me-2"></i>Tambah Pengguna</h4>
            </div>
            <div class="card-body p-5" style="background: #fff;">
                <!-- Flash Messages -->
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="{{ route('admin.users.store') }}" method="POST">
                    @csrf

                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror transition-scale"
                               value="{{ old('name') }}" required placeholder="Masukkan nama">
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror transition-scale"
                               value="{{ old('email') }}" required placeholder="Masukkan email">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Peran -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Peran</label>
                        <select name="role" class="form-select @error('role') is-invalid @enderror transition-scale" required>
                            <option disabled selected>-- Pilih Peran --</option>
                            <option value="buyer" {{ old('role') == 'buyer' ? 'selected' : '' }}>Pembeli</option>
                            <option value="seller" {{ old('role') == 'seller' ? 'selected' : '' }}>Penjual</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kata Sandi -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Kata Sandi</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror transition-scale" required placeholder="Masukkan kata sandi">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Konfirmasi Kata Sandi -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Konfirmasi Kata Sandi</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror transition-scale" required placeholder="Konfirmasi kata sandi">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-primary btn-lg transition-btn" style="background: #2B2A4C; border-color: #2B2A4C; border-radius: 25px;">
                            <i class="bi bi-check-circle me-2"></i>Simpan
                        </button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-secondary btn-lg transition-btn" style="border-radius: 25px;">
                            <i class="bi bi-arrow-left me-2"></i>Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<style>
.transition-scale {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.transition-scale:hover, .transition-scale:focus {
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(0,0,0,0.15);
}
.transition-btn {
    transition: all 0.3s ease;
}
.transition-btn:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 8px rgba(0,0,0,0.2);
}
.alert {
    border-radius: 10px;
}
.form-control, .form-select {
    border-radius: 10px;
    padding: 10px;
    font-size: 1rem;
}
.card {
    box-shadow: 0 8px 16px rgba(0,0,0,0.1);
}
</style>
@endsection