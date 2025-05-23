<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Admin - @yield('title', 'Dasbor')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            font-family: 'Poppins', sans-serif;
            color: #333;
        }

        /* Sidebar Styling */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            height: 100vh;
            background: linear-gradient(180deg, #2c3e50, #3498db);
            color: white;
            transition: all 0.3s ease;
            box-shadow: 3px 0 10px rgba(0,0,0,0.2);
            overflow-y: auto;
            z-index: 1000;
        }
        .sidebar-header {
            padding: 20px;
            text-align: center;
            background: rgba(0,0,0,0.2);
        }
        .sidebar .nav-link {
            color: #dfe6e9;
            padding: 12px 20px;
            border-radius: 10px;
            margin: 5px 10px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
        }
        .sidebar .nav-link i {
            margin-right: 10px;
        }
        .sidebar .nav-link:hover {
            background: rgba(255,255,255,0.2);
            color: white;
            transform: translateX(5px);
        }
        .sidebar .nav-link.active {
            background: #ffffff;
            color: #2c3e50 !important;
            font-weight: bold;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }

        /* Content Styling */
        .content {
            margin-left: 250px;
            padding: 20px;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                width: 0;
                overflow: hidden;
            }
            .sidebar.active {
                width: 250px;
            }
            .content {
                margin-left: 0;
            }
            .content.active {
                margin-left: 250px;
            }
        }

        /* Toggle Button */
        .toggle-btn {
            position: fixed;
            top: 10px;
            left: 10px;
            z-index: 1100;
            background: linear-gradient(45deg, #6c757d, #495057);
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
        }
        .toggle-btn:hover {
            background: linear-gradient(45deg, #495057, #6c757d);
            transform: rotate(90deg);
        }

        /* Table Styling */
        .table {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        }
        .table th, .table td {
            vertical-align: middle;
        }
        .btn-sm {
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            transition: all 0.3s ease;
        }
        .btn-sm:hover {
            transform: scale(1.1);
        }

        /* Header Animation */
        .header-animate {
            animation: slideInDown 0.5s ease;
        }
    </style>
</head>
<body>
    <!-- Toggle Button for Mobile -->
    <button class="btn toggle-btn d-md-none" onclick="toggleSidebar()">
        <i class="bi bi-list text-white fs-5"></i>
    </button>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header animate__animated animate__fadeIn">
            <h4 class="mb-0 fw-bold">Admin Panel</h4>
            <small class="text-light">Properti Management</small>
        </div>
        <nav class="nav flex-column py-3">
            <a class="nav-link active" href="{{ route('admin.dashboard') }}">
                <i class="bi bi-house-door"></i> Dashboard
            </a>
            <a class="nav-link" href="{{ route('admin.properties.index') }}">
                <i class="bi bi-building"></i> Data Rumah
            </a>
            <a class="nav-link" href="{{ route('admin.users.index') }}">
                <i class="bi bi-people"></i> Data Pengguna
        </nav>
    </div>

    <!-- Main Content -->
    <main class="content">
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