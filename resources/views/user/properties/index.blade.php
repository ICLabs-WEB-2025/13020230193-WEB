@extends('user.layouts.app')

@section('title', 'Daftar Rumah')

@section('content')
<style>
    /* Search Bar Styling */
    .search-bar {
        background: #fff;
        padding: 1.5rem;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 2rem;
    }
    .search-bar input, .search-bar select {
        border-radius: 10px;
        transition: border-color 0.3s ease;
    }
    .search-bar input:focus, .search-bar select:focus {
        border-color: #007bff;
        box-shadow: none;
    }
    .search-bar .btn {
        border-radius: 10px;
        padding: 0.5rem 2rem;
    }

    /* Property Card Styling */
    .property-card {
        border: none;
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .property-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
    }
    .property-card img {
        transition: transform 0.5s ease;
    }
    .property-card:hover img {
        transform: scale(1.05);
    }
    .property-card .card-body {
        padding: 1.5rem;
    }
    .property-card .card-title {
        font-size: 1.25rem;
        font-weight: 600;
    }
    .property-card .btn {
        border-radius: 20px;
        font-weight: 500;
    }

    /* Pagination Styling */
    .pagination .page-link {
        border-radius: 5px;
        margin: 0 3px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }
    .pagination .page-item.active .page-link {
        background-color: #007bff;
        border-color: #007bff;
    }
    .pagination .page-link:hover {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    /* Animasi Fade */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .animate-fade-in {
        animation: fadeInUp 0.5s ease-out;
        animation-fill-mode: both;
    }
</style>

<div class="container py-5">
    <h2 class="fw-bold mb-4 text-center animate-fade-in">Daftar Rumah Tersedia</h2>

    <!-- Search and Filter -->
    <div class="search-bar animate-fade-in">
        <form action="{{ route('user.properties.index') }}" method="GET">
            <div class="row g-3">
                <div class="col-md-4">
                    <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan judul atau alamat..." value="{{ request('search') }}">
                </div>
                <div class="col-md-3">
                    <select name="status" class="form-select">
                        <option value="">Semua Status</option>
                        <option value="available" {{ request('status') == 'available' ? 'selected' : '' }}>Tersedia</option>
                        <option value="sold" {{ request('status') == 'sold' ? 'selected' : '' }}>Terjual</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select name="sort" class="form-select">
                        <option value="price_asc" {{ request('sort') == 'price_asc' ? 'selected' : '' }}>Harga: Rendah ke Tinggi</option>
                        <option value="price_desc" {{ request('sort') == 'price_desc' ? 'selected' : '' }}>Harga: Tinggi ke Rendah</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Cari</button>
                </div>
            </div>
        </form>
    </div>

    <!-- Daftar Rumah -->
    <div class="row">
        @forelse ($properties as $index => $property)
            <div class="col-md-4 mb-4">
                <div class="card property-card animate-fade-in" style="animation-delay: {{ $index * 0.1 }}s;">
                    @if($property->image)
                        <img src="{{ asset('storage/' . $property->image) }}"
                             class="card-img-top"
                             alt="Rumah"
                             style="height: 200px; object-fit: cover;">
                    @else
                        <img src="https://via.placeholder.com/600x300?text=No+Image"
                             class="card-img-top"
                             alt="No Image"
                             style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $property->title }}</h5>
                        <p class="card-text text-muted small"><i class="bi bi-geo-alt me-1"></i>{{ $property->address }}</p>
                        <p class="fw-bold text-success mb-2">Rp {{ number_format($property->price, 0, ',', '.') }}</p>
                        <span class="badge bg-{{ $property->status == 'available' ? 'success' : 'secondary' }} mb-2">
                            {{ ucfirst($property->status == 'available' ? 'Tersedia' : 'Terjual') }}
                        </span>
                        <div>
                            <a href="{{ url('/properties/' . $property->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col text-center py-5">
                <i class="bi bi-house-door-fill display-4 text-muted mb-3"></i>
                <p class="text-muted">Belum ada rumah yang tersedia saat ini.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if($properties->hasPages())
        <div class="d-flex justify-content-center mt-4 animate-fade-in">
            {{ $properties->appends(request()->query())->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection