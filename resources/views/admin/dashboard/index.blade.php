@extends('admin.layouts.app')

@section('content')
<div class="container-fluid py-5" style="background: linear-gradient(180deg, #1A2C42 0%, #2B4A6C 100%); min-height: 100vh;">
    <div class="container">
        <h1 class="mb-5 text-white text-center fw-bold animate__animated animate__fadeInDown" style="font-size: 2.5rem; text-shadow: 2px 2px 4px rgba(0,0,0,0.3);">
            Selamat Datang di Panel Admin
        </h1>
        <div class="row g-4">
            <!-- Data Rumah Card -->
            <div class="col-md-6 col-lg-4 animate__animated animate__fadeInUp" style="animation-delay: 0.2s;">
                <div class="card shadow-lg border-0 h-100 transition-hover" style="border-radius: 15px; overflow: hidden; background: rgba(255, 255, 255, 0.1);">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-building display-4 text-white mb-3"></i>
                        <h5 class="card-title fw-bold text-white">Data Rumah</h5>
                        <p class="card-text text-white-50">Kelola daftar rumah dengan mudah dan cepat.</p>
                        <a href="{{ route('admin.properties.index') }}" class="btn btn-light btn-lg mt-3 transition-btn" style="border-radius: 25px; padding: 10px 20px;">
                            Lihat Data Rumah
                        </a>
                    </div>
                </div>
            </div>
            <!-- Data Pengguna Card -->
            <div class="col-md-6 col-lg-4 animate__animated animate__fadeInUp" style="animation-delay: 0.4s;">
                <div class="card shadow-lg border-0 h-100 transition-hover" style="border-radius: 15px; overflow: hidden; background: rgba(255, 255, 255, 0.1);">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-people display-4 text-white mb-3"></i>
                        <h5 class="card-title fw-bold text-white">Data Pengguna</h5>
                        <p class="card-text text-white-50">Kelola data pembeli dan penjual secara efisien.</p>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-light btn-lg mt-3 transition-btn" style="border-radius: 25px; padding: 10px 20px;">
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
.transition-hover {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.transition-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
}
.transition-btn {
    transition: background-color 0.3s ease, transform 0.3s ease;
}
.transition-btn:hover {
    background-color: #ffffff;
    color: #1A2C42;
    transform: scale(1.05);
}
.text-white-50 {
    color: rgba(255, 255, 255, 0.5) !important;
}
</style>

<!-- Include Animate.css for animations -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
@endsection