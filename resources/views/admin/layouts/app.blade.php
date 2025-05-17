<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Panel Admin - @yield('title', 'Dasbor')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            transition: all 0.3s;
            z-index: 1000;
        }
        .sidebar .nav-link {
            border-radius: 5px;
            margin-bottom: 5px;
        }
        .sidebar .nav-link:hover {
            background-color: #495057;
        }
        .sidebar .nav-link.active {
            background-color: #007bff;
            color: white !important;
            font-weight: bold;
        }
        .content {
            margin-left: 220px;
            transition: all 0.3s;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            .sidebar.active {
                width: 220px;
            }
            .content {
                margin-left: 0;
            }
            .content.active {
                margin-left: 220px;
            }
        }
        .table {
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        .btn-sm {
            padding: 0.25rem 0.5rem;
        }
    </style>
</head>
<body>
    <!-- Tombol Toggle Sidebar untuk Mobile -->
    <button class="btn btn-dark d-md-none m-2" type="button" onclick="toggleSidebar()">
        <i class="bi bi-list"></i>
    </button>

    @include('components.sidebar')

    <main class="content p-4">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function toggleSidebar() {
            document.querySelector('.sidebar').classList.toggle('active');
            document.querySelector('.content').classList.toggle('active');
        }
    </script>
</body>
</html>