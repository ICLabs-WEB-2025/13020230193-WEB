@extends('layouts.app')

@section('content')

@section('content')
<div class="container py-4">
    <h1 class="mb-4">Selamat Datang di Panel Admin</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-building me-2"></i>Data Rumah</h5>
                    <p class="card-text">Kelola daftar rumah yang tersedia.</p>
                    <a href="{{ route('admin.properties.index') }}" class="btn btn-primary">Lihat Data Rumah</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="card-title"><i class="bi bi-people me-2"></i>Data Pengguna</h5>
                    <p class="card-text">Kelola pengguna (pembeli dan penjual).</p>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-primary">Lihat Data Pengguna</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection