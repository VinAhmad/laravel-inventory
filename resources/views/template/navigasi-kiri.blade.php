<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <div class="sb-sidenav-menu-heading">Menu</div>
            <a class="nav-link {{ (Request::segment(1) == 'dashboard') ? 'active' : ''}}" href="{{ url('/dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a>
            <a class="nav-link {{ (Request::segment(1) == 'master') ? 'active' : '' }}" href="{{ route('master') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-database"></i></div>
                Master Data
            </a>
            <a class="nav-link {{ (Request::segment(1) == 'stok-masuk') ? 'active' : '' }}" href="{{ route('stok-masuk') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-box"></i></div>
                Stok Masuk
            </a>
            <a class="nav-link {{ (Request::segment(1) == 'stok-keluar') ? 'active' : '' }}" href="{{ route('stok-keluar') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-dolly"></i></div>
                Stok Keluar
            </a>
            <a class="nav-link {{ (Request::segment(1) == 'riwayat-barang') ? 'active' : '' }}" href="{{ route('riwayat-barang') }}">
                <div class="sb-nav-link-icon"><i class="fa-solid fa-clock-rotate-left"></i></div>
                Riwayat Barang
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">Logged in as:</div>
        {{ Auth::user()->name }}
    </div>
</nav>
