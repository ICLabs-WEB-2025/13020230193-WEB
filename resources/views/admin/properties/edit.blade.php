@extends('admin.layouts.app')

@section('title', 'Edit Rumah')

@section('content')
<div class="container-fluid py-5">
    <div class="container">
        <div class="card shadow-lg border-0 animate__animated animate__fadeIn" style="border-radius: 15px; overflow: hidden;">
            <div class="card-header" style="background: linear-gradient(45deg, #ff9a9e, #fad0c4); color: white;">
                <h4 class="mb-0 fw-bold"><i class="bi bi-house-gear me-2"></i>Edit Rumah</h4>
            </div>
            <div class="card-body p-4" style="background: rgba(255,255,255,0.95);">
                <form action="{{ route('admin.properties.update', $property->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Seller -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Pemilik (Seller)</label>
                        <select name="user_id" class="form-select @error('user_id') is-invalid @enderror transition-scale" required>
                            @foreach($sellers as $seller)
                                <option value="{{ $seller->id }}" {{ old('user_id', $property->user_id) == $seller->id ? 'selected' : '' }}>
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
                               value="{{ old('title', $property->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Harga -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Harga (Rp)</label>
                        <input type="number" name="price" class="form-control @error('price') is-invalid @enderror transition-scale"
                               value="{{ old('price', $property->price) }}" required step="1" min="0">
                        @error('price')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Deskripsi -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Deskripsi</label>
                        <textarea name="description" class="form-control @error('description') is-invalid @enderror transition-scale"
                                  rows="5">{{ old('description', $property->description) }}</textarea>
                        @error('description')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Alamat</label>
                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror transition-scale"
                               value="{{ old('address', $property->address) }}" required>
                        @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Gambar -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Foto Rumah</label><br>
                        @if($property->image)
                            <div class="position-relative d-inline-block">
                                <img src="{{ asset('storage/' . $property->image) }}" class="img-thumbnail mb-3 transition-scale"
                                     style="max-height: 200px; object-fit: cover;" alt="Property Image">
                                <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0" style="transform: translate(50%, -50%);"
                                        onclick="this.nextElementSibling.value=''">
                                    <i class="bi bi-x"></i>
                                </button>
                                <input type="hidden" name="current_image" value="{{ $property->image }}">
                            </div>
                        @endif
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror transition-scale">
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Status -->
                    <div class="mb-4">
                        <label class="form-label fw-bold text-dark">Status</label>
                        <select name="status" class="form-select @error('status') is-invalid @enderror transition-scale" required>
                            <option value="available" {{ old('status', $property->status) == 'available' ? 'selected' : '' }}>Tersedia</option>
                            <option value="sold" {{ old('status', $property->status) == 'sold' ? 'selected' : '' }}>Terjual</option>
                        </select>
                        @error('status')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn btn-success btn-lg transition-btn" style="border-radius: 25px;">
                            <i class="bi bi-check-circle me-2"></i>Perbarui
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