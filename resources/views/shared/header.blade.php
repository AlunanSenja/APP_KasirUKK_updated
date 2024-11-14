<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">App Kasir</a>

            @if (Auth::check())
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link {{ session('menu') === 'dashboard' ? 'active' : ''}}" href="{{ url('/dashboard')}}">Dashboard</a>
                        </li>

                        @if (Auth::user()->level === 'admin')
                            <li class="nav-item">
                                <a class="nav-link {{ session('menu') === 'user' ? 'active' : ''}}" href="{{ url('/user')}}">Data User</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link {{ session('menu') === 'pelanggan' ? 'active' : ''}}" href="{{ url('/pelanggan')}}">Data Pelanggan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ session('menu') === 'produk' ? 'active' : ''}}" href="{{ url('/produk')}}">Data Produk</a>
                        </li>

                        @if (Auth::user()->level === 'petugas')
                            <li class="nav-item">
                                <a class="nav-link {{ session('menu') === 'penjualan' ? 'active' : ''}}" href="{{ url('/penjualan')}}">Data Penjualan</a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <a class="nav-link {{ session('menu') === 'stok' ? 'active' : ''}}" href="{{ url('/stok')}}">Stok Produk</a>
                        </li>
                    </ul>
                    {{-- Optional search form can be added here --}}
                </div>
            @endif
        </div>
    </nav>
</header>