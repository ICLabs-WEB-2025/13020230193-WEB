@extends('user.layouts.app')

@section('title', 'Beranda')

@section('content')

<style>
    /* Hero Section */
    .hero-section {
        position: relative;
        background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');
        background-size: cover;
        background-position: center;
        background-attachment: fixed;
        height: 80vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        text-align: center;
    }
    .hero-section h1 {
        font-weight: 700;
        text-shadow: 2px 2px 10px rgba(0, 0, 0, 0.5);
        animation: fadeInDown 1s ease-out;
    }
    .hero-section p {
        font-size: 1.2rem;
        text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.3);
        animation: fadeInUp 1s ease-out 0.5s;
        animation-fill-mode: both;
    }
    .hero-section .btn {
        font-weight: 600;
        padding: 0.75rem 2rem;
        border-radius: 25px;
        transition: transform 0.3s ease, background-color 0.3s ease;
        animation: fadeInUp 1s ease-out 1s;
        animation-fill-mode: both;
    }
    .hero-section .btn:hover {
        transform: translateY(-3px);
        background-color: #ffca2c;
    }

    /* Animasi Fade */
    @keyframes fadeInDown {
        from { opacity: 0; transform: translateY(-20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    /* Fitur Utama */
    .feature-card {
        background: #fff;
        padding: 2rem;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .feature-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    }
    .feature-card i {
        font-size: 3rem;
        margin-bottom: 1rem;
    }

    /* Carousel Rumah */
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
    .carousel-control-prev, .carousel-control-next {
        width: 5%;
        background: rgba(0, 0, 0, 0.3);
        border-radius: 50%;
        height: 50px;
        top: 50%;
        transform: translateY(-50%);
    }
    .carousel-control-prev-icon, .carousel-control-next-icon {
        background-size: 50%;
    }
</style>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <h1 class="display-3 fw-bold">Temukan Rumah Impianmu</h1>
        <p class="lead">Platform pencarian properti terpercaya untuk pembeli dan penjual rumah di seluruh Indonesia.</p>
        <a href="#properties" class="btn btn-warning btn-lg mt-3">Jelajahi Rumah</a>
    </div>
</section>

<!-- Fitur Utama -->
<section class="container my-5">
    <h2 class="text-center fw-bold mb-5">Mengapa Memilih Kami?</h2>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="feature-card">
                <i class="bi bi-house-door text-primary"></i>
                <h5 class="fw-bold mt-3">Banyak Pilihan</h5>
                <p>Kami memiliki ratusan rumah dari penjual terpercaya di berbagai lokasi strategis.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="feature-card">
                <i class="bi bi-cash-coin text-success"></i>
                <h5 class="fw-bold mt-3">Harga Terjangkau</h5>
                <p>Dapatkan harga terbaik dan kompetitif dengan fasilitas lengkap.</p>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="feature-card">
                <i class="bi bi-calculator text-warning"></i>
                <h5 class="fw-bold mt-3">Simulasi KPR</h5>
                <p>Gunakan kalkulator KPR untuk menghitung estimasi cicilan rumah yang kamu impikan.</p>
            </div>
        </div>
    </div>
</section>

<!-- Carousel Rumah -->
<section class="container my-5" id="properties">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="fw-bold">Rumah Terbaru</h2>
        <a href="{{ url('/properties') }}" class="btn btn-outline-primary btn-sm px-4">Lihat Semua</a>
    </div>

    @if ($properties->count())
        <div id="propertyCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($properties->chunk(3) as $chunkIndex => $chunk)
                    <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                        <div class="row">
                            @foreach ($chunk as $property)
                                <div class="col-md-4">
                                    <div class="card property-card shadow-sm">
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
                                            <a href="{{ url('/properties/' . $property->id) }}" class="btn btn-primary btn-sm">Lihat Detail</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#propertyCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Sebelumnya</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#propertyCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Berikutnya</span>
            </button>
        </div>
    @else
        <div class="text-center py-5">
            <i class="bi bi-house-door-fill display-4 text-muted mb-3"></i>
            <p class="text-muted">Belum ada rumah tersedia.</p>
        </div>
    @endif
</section>

@endsection