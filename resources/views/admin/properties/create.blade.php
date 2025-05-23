@extends('admin.layouts.app')

@section('title', 'Tambah Rumah')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="card shadow-lg border-0 animate__animated animate__fadeIn" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header" style="background: linear-gradient(45deg, #6e8efb, #a777e3); color: white;">
                <h4 class="mb-0 fw-bold"><i class="bi bi-house-add me-2"></i>Tambah Rumah</h4>
            </div>
            <div class="card-body p-4" style="background: rgba(255,255,255,0.95);">
                <form action="{{ route('admin.properties.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Pemilik Rumah -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Pemilik (Seller)</label>
                        <select name="user_id" class="form-select @error('user_id') is-invalid @enderror transition-scale" required>
                            <option value="">-- Pilih Seller --</option>
                            @foreach ($sellers as $seller)
                                <option value="{{ $seller->id }}" {{ old('user_id') == $seller->id ? 'selected' : '' }}>
                                    {{ $seller->name }} ({{ $seller->email }})
                                </option>
                            @endforeach
                        </select>
                        @error('user_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Judul -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Judul</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror transition-scale"
                               value="{{ old('title') }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Harga (Rp)</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror transition-scale"
                               value="{{ old('price') }}" required step="1" min="0">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Deskripsi</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror transition-scale"
                                  rows="5">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Alamat</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror transition-scale"
                               value="{{ old('address') }}" required>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Upload Gambar -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Foto Rumah</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror transition-scale">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror transition-scale" required>
                            <option value="available" {{ old('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                            <option value="sold" {{ old('status') == 'sold' ? 'selected' : '' }}>Terjual</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-success btn-lg transition-btn" style="border-radius: 25px;">
                            <i class="bi bi-check-circle me-2"></i>Simpan
                        </button>
                        <a href="{{ route('admin.properties.index') }}" class="btn btn-outline-secondary btn-lg transition-btn" style="border-radius: 25px;">
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