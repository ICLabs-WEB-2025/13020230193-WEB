<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - KPR Properti</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap & Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            background: linear-gradient(135deg, #e3f2fd 0%, #bbdefb 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            position: relative;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        .brand-logo {
            font-size: 2rem;
            font-weight: bold;
            color: #fff;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
        .card-header {
            background: linear-gradient(90deg, #0d6efd 0%, #42a5f5 100%);
            padding: 1.5rem;
            border-bottom: none;
        }
        .form-control {
            border-radius: 10px;
            padding: 0.75rem 1rem;
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }
        .form-control:focus {
            border-color: #0d6efd;
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
        }
        .btn-primary {
            border-radius: 25px;
            padding: 0.75rem;
            font-weight: 500;
            background: linear-gradient(90deg, #0d6efd 0%, #42a5f5 100%);
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(13, 110, 253, 0.4);
        }
        .btn-outline-success, .btn-outline-info {
            border-radius: 25px;
            font-weight: 500;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-outline-success:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(40, 167, 69, 0.3);
        }
        .btn-outline-info:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(23, 162, 184, 0.3);
        }
        .input-group-text {
            background-color: #f8f9fa;
            border-radius: 10px 0 0 10px;
            border: 1px solid #ced4da;
            border-right: none;
        }
        .alert {
            border-radius: 10px;
        }
        .back-button {
            position: absolute;
            top: 20px;
            right: 20px;
            border-radius: 25px;
            padding: 0.5rem 1rem;
            font-weight: 500;
            background: linear-gradient(90deg, #6c757d 0%, #adb5bd 100%);
            border: none;
            color: #fff;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .back-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(108, 117, 125, 0.4);
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in {
            animation: fadeInUp 0.5s ease-out;
            animation-fill-mode: both;
        }
    </style>
</head>
<body>
    <a href="{{ route('user.home') }}" class="back-button">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>

    <div class="card login-card animate-fade-in">
        <div class="card-header text-center text-white">
            <div class="brand-logo mb-0">
                <i class="bi bi-house-door-fill me-1"></i> KPR Properti
            </div>
            <small class="d-block">Silakan login ke akun Anda</small>
        </div>

        <div class="card-body p-4">
            {{-- Error --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show small" role="alert">
                    {{ $errors->first() }}
                    <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Form Login --}}
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" name="email" class="form-control" placeholder="email@example.com" required autofocus value="{{ old('email') }}">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </button>
            </form>

            <hr class="my-4">

            <p class="text-center small text-muted mb-2">Belum punya akun?</p>

            <div class="d-flex gap-2">
                <a href="{{ route('register.buyer') }}" class="btn btn-outline-success w-50">
                    <i class="bi bi-person-plus me-1"></i> Buyer
                </a>
                <a href="{{ route('register.seller') }}" class="btn btn-outline-info w-50">
                    <i class="bi bi-shop-window me-1"></i> Seller
                </a>
            </div>
        </div>
    </div>

    {{-- JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>