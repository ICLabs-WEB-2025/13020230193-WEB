@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-5" style="background: linear-gradient(135deg, #6e8efb, #a777e3); min-height: 100vh;">
    <div class="container">
        <h1 class="mb-5 text-white text-center fw-bold animate__animated animate__fadeInDown" style="font-size: 2.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.2);">
            Selamat Datang di Panel Admin
        </h1>
        <div class="row g-4">
            <!-- Data Rumah Card -->
            <div class="col-md-6 col-lg-4 animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                <div class="card shadow-lg border-0 h-100 transition-scale" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-body text-center p-4" style="background: linear-gradient(45deg, #ff9a9e, #fad0c4);">
                        <i class="bi bi-building display-4 text-primary mb-3"></i>
                        <h5 class="card-title fw-bold text-dark">Data Rumah</h5>
                        <p class="card-text text-muted">Kelola daftar rumah yang tersedia dengan mudah dan cepat.</p>
                        <a href="{{ route('admin.properties.index') }}" class="btn btn-primary btn-lg mt-3 transition-btn" style="border-radius: 25px; padding: 10px 20px;">
                            Lihat Data Rumah
                        </a>
                    </div>
                </div>
            </div>
            <!-- Data Pengguna Card -->
            <div class="col-md-6 col-lg-4 animate__animated animate__fadeInUp" style="animation-delay: 0.4s;">
                <div class="card shadow-lg border-0 h-100 transition-scale" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-body text-center p-4" style="background: linear-gradient(45deg, #a1c4fd, #c2e9fb);">
                        <i class="bi bi-people display-4 text-success mb-3"></i>
                        <h5 class="card-title fw-bold text-dark">Data Pengguna</h5>
                        <p class="card-text text-muted">Kelola data pembeli dan penjual secara efisien.</p>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-success btn-lg mt-3 transition-btn" style="border-radius: 25px; padding: 10px 20px;">
                            Lihat Data Pengguna
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom CSS for Animations and Hover Effects -->
<style>
.transition-scale {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.transition-scale:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
}
.transition-btn {
    transition: background-color 0.3s ease, transform 0.3s ease;
}
.transition-btn:hover {
    transform: scale(1.05);
}
</style>

<!-- Include Animate.css for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection