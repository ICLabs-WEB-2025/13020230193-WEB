<div class="bg-dark text-white position-fixed vh-100 p-3 sidebar" style="width: 220px;">
    <h5 class="text-white">Panel Admin</h5>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link text-white {{ Route::is('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-house-door me-2"></i> Dasbor
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.properties.index') }}"
               class="nav-link text-white {{ Route::is('admin.properties.*') ? 'active' : '' }}">
                <i class="bi bi-building me-2"></i> Data Rumah
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}"
               class="nav-link text-white {{ Route::is('admin.users.*') ? 'active' : '' }}">
                <i class="bi bi-people me-2"></i> Data Pengguna
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('logout') }}" class="nav-link text-white"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-left me-2"></i> Keluar
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>