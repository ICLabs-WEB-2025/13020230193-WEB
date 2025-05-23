<div class="sidebar position-fixed vh-100 p-3" style="width: 250px; background: linear-gradient(180deg, #2c3e50, #3498db); box-shadow: 3px 0 10px rgba(0,0,0,0.2); overflow-y: auto; z-index: 1000;">
    <div class="sidebar-header text-center mb-4 animate__animated animate__fadeIn">
        <h5 class="text-white fw-bold mb-1">Panel Admin</h5>
        <small class="text-light">Properti Management</small>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a href="{{ route('admin.dashboard') }}"
               class="nav-link text-white {{ Route::is('admin.dashboard') ? 'active' : '' }} transition-scale">
                <i class="bi bi-house-door me-2"></i> Dasbor
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.properties.index') }}"
               class="nav-link text-white {{ Route::is('admin.properties.*') ? 'active' : '' }} transition-scale">
                <i class="bi bi-building me-2"></i> Data Rumah
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('admin.users.index') }}"
               class="nav-link text-white {{ Route::is('admin.users.*') ? 'active' : '' }} transition-scale">
                <i class="bi bi-people me-2"></i> Data Pengguna
            </a>
        </li>
        <li class="nav-item mt-4">
            <a href="{{ route('logout') }}" class="nav-link text-white transition-scale"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="bi bi-box-arrow-left me-2"></i> Keluar
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>

<style>
.sidebar .nav-link {
    border-radius: 10px;
    margin: 5px 10px;
    padding: 12px 15px;
    display: flex;
    align-items: center;
    transition: all 0.3s ease;
}
.sidebar .nav-link:hover {
    background: rgba(255,255,255,0.2);
    transform: translateX(5px);
}
.sidebar .nav-link.active {
    background: #ffffff;
    color: #2c3e50 !important;
    font-weight: bold;
    box-shadow: 0 2px 5px rgba(0,0,0,0.2);
}
.transition-scale {
    transition: transform 0.3s ease, background 0.3s ease;
}
</style>