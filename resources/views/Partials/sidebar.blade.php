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
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <i class="mdi mdi-palette menu-icon"></i>
                <span class="menu-title">Master Data</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('item') }}">Item</a>
                    </li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('category') }}">Kategori Barang</a>
                    </li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('category') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Category</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('item') }}">
                <i class="mdi mdi-view-headline menu-icon"></i>
                <span class="menu-title">Item</span>
            </a>
        </li>
        
        <li class="nav-item">
            <form class="nav-link" action="{{ url('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger btn-sm menu-title">Logout</button>
            </form>
        </li>
    </ul>
</nav>
