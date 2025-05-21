@extends('user.layouts.app')

@section('title', 'Kalkulator KPR')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">Kalkulator KPR</h2>

    <form action="{{ route('user.kpr.calculate') }}" method="POST" class="card p-4 shadow-sm mb-5">
        @csrf

        <div class="mb-3">
            <label class="form-label">Harga Rumah (Rp)</label>
            <input type="number" name="house_price" class="form-control @error('house_price') is-invalid @enderror"
                   value="{{ old('house_price', $inputs['house_price'] ?? '') }}" required>
            @error('house_price')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Uang Muka / DP (Rp)</label>
            <input type="number" name="down_payment" class="form-control @error('down_payment') is-invalid @enderror"
                   value="{{ old('down_payment', $inputs['down_payment'] ?? '') }}" required>
            @error('down_payment')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Suku Bunga (%)</label>
            <input type="number" name="interest_rate" step="0.01"
                   class="form-control @error('interest_rate') is-invalid @enderror"
                   value="{{ old('interest_rate', $inputs['interest_rate'] ?? '') }}" required>
            @error('interest_rate')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Lama Cicilan (tahun)</label>
            <input type="number" name="loan_term" class="form-control @error('loan_term') is-invalid @enderror"
                   value="{{ old('loan_term', $inputs['loan_term'] ?? '') }}" required>
            @error('loan_term')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary w-100 mt-3">Hitung Cicilan</button>
    </form>

    @isset($monthly_payment)
        <div class="alert alert-success text-center">
            <h5 class="fw-bold">Estimasi Cicilan per Bulan</h5>
            <h3 class="text-success">Rp {{ number_format($monthly_payment, 0, ',', '.') }}</h3>
        </div>
    @endisset
</div>
@endsection
