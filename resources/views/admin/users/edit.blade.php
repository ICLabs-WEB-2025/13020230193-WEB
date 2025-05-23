@extends('admin.layouts.app')

@section('title', 'Edit Pengguna')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="card shadow-lg border-0 animate__animated animate__fadeIn" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header" style="background: linear-gradient(45deg, #ff9a9e, #fad0c4); color: white;">
                <h4 class="mb-0 fw-bold"><i class="bi bi-person-gear me-2"></i>Edit Pengguna</h4>
            </div>
            <div class="card-body p-4" style="background: rgba(255,255,255,0.95);">
                <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <!-- Nama -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Nama</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror transition-scale"
                               value="{{ old('name', $user->name) }}" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Email</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror transition-scale"
                               value="{{ old('email', $user->email) }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Peran -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Peran</label>
                        <select name="role" class="form-select @error('role') is-invalid @enderror transition-scale" required>
                            <option value="buyer" {{ old('role', $user->role) == 'buyer' ? 'selected' : '' }}>Pembeli</option>
                            <option value="seller" {{ old('role', $user->role) == 'seller' ? 'selected' : '' }}>Penjual</option>
                        </select>
                        @error('role')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kata Sandi Baru -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Kata Sandi Baru (Opsional)</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror transition-scale"
                               placeholder="Kosongkan jika tidak ingin mengubah">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Konfirmasi Kata Sandi -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Konfirmasi Kata Sandi</label>
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror transition-scale"
                               placeholder="Ulangi kata sandi baru">
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-success btn-lg transition-btn" style="border-radius: 25px;">
                            <i class="bi bi-check-circle me-2"></i>Perbarui
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
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
}
.transition-btn {
    transition: all 0.3s ease;
}
.transition-btn:hover {
    transform: scale(1.05);
}
</style>
@endsection