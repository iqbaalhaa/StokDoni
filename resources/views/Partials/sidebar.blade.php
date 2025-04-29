<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item sidebar-category">
            <p></p>
            <span></span>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="index.html">
                <i class="mdi mdi-view-quilt menu-icon"></i>
                <span class="menu-title">Dashboard</span>
                <div class="badge badge-info badge-pill">2</div>
            </a>
        </li>
        
        <li class="nav-item sidebar-category">
            <p>Menu</p>
            <span></span>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#master-data" aria-expanded="false"
                aria-controls="master-data">
                <i class="mdi mdi-palette menu-icon"></i>
                <span class="menu-title">Master Data</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="master-data">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('item') }}">Data Barang</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('category') }}">Kategori Barang</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#transaksi" aria-expanded="false"
                aria-controls="transaksi">
                <i class="mdi mdi-cart menu-icon"></i>
                <span class="menu-title">Transaksi</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="transaksi">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Stok Masuk</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Stok Keluar</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Stok Opname</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#supplier" aria-expanded="false"
                aria-controls="supplier">
                <i class="mdi mdi-package-variant menu-icon"></i>
                <span class="menu-title">Supplier</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="supplier">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Daftar Supplier</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Riwayat Pembelian</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#pelanggan" aria-expanded="false"
                aria-controls="pelanggan">
                <i class="mdi mdi-account-group menu-icon"></i>
                <span class="menu-title">Pelanggan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="pelanggan">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Daftar Pelanggan</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Riwayat Penjualan</a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#laporan" aria-expanded="false"
                aria-controls="laporan">
                <i class="mdi mdi-book-multiple menu-icon"></i>
                <span class="menu-title">Laporan</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="laporan">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Laporan Stok</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Laporan Barang Masuk</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Laporan Barang Keluar</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Laporan Pembelian</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="#">Laporan Penjualan</a>
                    </li>
                </ul>
            </div>
        </li>
        
        <li class="nav-item">
            <form class="nav-link" action="{{ url('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm menu-title">Logout</button>
            </form>
        </li>
    </ul>
</nav>
