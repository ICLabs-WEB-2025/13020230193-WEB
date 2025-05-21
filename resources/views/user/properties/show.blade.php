@extends('user.layouts.app')

@section('title', $property->title)

@section('content')
<style>
    /* Container Styling */
    .property-detail {
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        padding: 2rem;
    }

    /* Image Styling */
    .property-image {
        border-radius: 15px;
        overflow: hidden;
        position: relative;
    }
    .property-image img {
        transition: transform 0.5s ease;
    }
    .property-image:hover img {
        transform: scale(1.05);
    }

    /* Info Section */
    .info-section {
        padding: 1.5rem;
    }
    .info-section h3 {
        font-weight: 700;
        color: #333;
    }
    .info-section .price {
        font-size: 1.5rem;
        font-weight: 600;
    }
    .info-section .badge {
        font-size: 0.9rem;
        padding: 0.5rem 1rem;
        border-radius: 20px;
    }
    .info-section .description {
        background: #f8f9fa;
        padding: 1rem;
        border-radius: 10px;
        line-height: 1.6;
    }

    /* WhatsApp Button */
    .btn-whatsapp {
        border-radius: 25px;
        padding: 0.75rem 1.5rem;
        font-weight: 500;
        transition: transform 0.3s ease, background-color 0.3s ease;
    }
    .btn-whatsapp:hover {
        transform: translateY(-3px);
        background-color: #25d366;
    }

    /* Map Styling */
    .map-section {
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    .map-section iframe {
        width: 100%;
        height: 400px;
        border: none;
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
    .btn-kpr {
        background: linear-gradient(135deg, #007bff, #0056b3);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px 20px;
        font-weight: 500;
            transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(0, 123, 255, 0.3);
    }

    .btn-kpr:hover {
        background: linear-gradient(135deg, #0056b3, #003f7f);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(0, 86, 179, 0.4);
        text-decoration: none;
    }
</style>

<div class="container py-5">
    <!-- Tombol Kembali -->
    <div class="mb-4 animate-fade-in">
        <a href="{{ route('user.properties.index') }}" class="btn btn-outline-secondary btn-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar
        </a>
    </div>

    <!-- Detail Rumah -->
    <div class="property-detail animate-fade-in">
        <div class="row">
            <!-- Gambar Rumah -->
            <div class="col-md-6 mb-4">
                <div class="property-image">
                    @if($property->image)
                        <img src="{{ asset('storage/' . $property->image) }}"
                             class="img-fluid"
                             alt="Gambar Rumah"
                             style="max-height: 400px; object-fit: cover; width: 100%;">
                    @else
                        <img src="https://via.placeholder.com/600x400?text=No+Image"
                             class="img-fluid"
                             alt="No Image"
                             style="max-height: 400px; object-fit: cover; width: 100%;">
                    @endif
                </div>
            </div>

            <!-- Informasi Rumah -->
            <div class="col-md-6">
                <div class="info-section">
                    <h3 class="mb-3">{{ $property->title }}</h3>
                    <p class="text-muted mb-2"><i class="bi bi-geo-alt me-1"></i>{{ $property->address }}</p>
                    <h4 class="price text-success mb-3">Rp {{ number_format($property->price, 0, ',', '.') }}</h4>
                    <p class="badge bg-{{ $property->status == 'available' ? 'success' : 'secondary' }} mb-3">
                        {{ ucfirst($property->status == 'available' ? 'Tersedia' : 'Terjual') }}
                    </p>

                    <hr>

                    <h5 class="fw-bold mb-3">Deskripsi</h5>
                    <div class="description">
                        <p>{{ $property->description ?: 'Tidak ada deskripsi tersedia.' }}</p>
                    </div>

                    <!-- Tombol Kontak WhatsApp -->
                    <a href="https://wa.me/6289518804219?text=Saya%20tertarik%20dengan%20properti%20{{ urlencode($property->title) }}%20di%20{{ urlencode($property->address) }}.%20Bisa%20berikan%20info%20lebih%20lanjut?" target="_blank" class="btn btn-success btn-whatsapp mt-3">
                        <i class="bi bi-whatsapp me-1"></i> Hubungi Penjual
                    </a>
                    <a class="btn btn-primary mt-3 btn-kpr" href="#">
                        <i class="bi bi-calculator me-2"></i> Hitung Menggunakan KPR Calculator
                    </a>                    
                </div>
            </div>
        </div>
    </div>

    <!-- Map Lokasi -->
    <div class="mt-5 animate-fade-in">
        <h5 class="fw-bold mb-3">Lokasi (Umum)</h5>
        <div class="map-section">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3974.206418454863!2d119.49099771029441!3d-5.07026539488526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dbefd7c590fa689%3A0xe53e099a23240d38!2sSummarecon%20Mutiara%20Makassar!5e0!3m2!1sid!2sid!4v1747646976525!5m2!1sid!2sid"
                allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>
@endsection