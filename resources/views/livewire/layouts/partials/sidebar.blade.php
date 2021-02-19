<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header pb-2">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="{{ route('dashboard') }}">
                        <div class = "h4">Favbee <span class = "text-muted">Admin</span></div>
                    </a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title ">Menu</li>

                <li class="sidebar-item">
                    <a href="{{ route('dashboard') }}" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-title">Master</li>

                <li class="sidebar-item has-sub">
                    <a href="" class='sidebar-link'>
                        <i class="bi bi-box"></i>
                        <span>Products</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item">
                            <a href="{{ route('kategori') }}">Category</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('tag') }}">Tags</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('diskon')}}">Promo Diskon</a>
                        </li>
                        <li class="submenu-item">
                            <a href="{{ route('product') }}">Products</a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item ">
                    <a href="{{ route('cs') }}" class='sidebar-link'>
                        <i class="bi bi-emoji-smile"></i>
                        <span>Customer Service</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-cart3"></i>
                        <span>Penjualan</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="{{ route('konsumen')}}" class='sidebar-link'>
                        <i class="bi bi-people"></i>
                        <span>Konsumen</span>
                    </a>
                </li>

                <li class="sidebar-title">Laporan</li>


                <li class="sidebar-item ">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-book"></i>
                        <span>Fast & Slow Moving</span>
                    </a>
                </li>

                <li class="sidebar-item ">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-book"></i>
                        <span>Penjualan</span>
                    </a>
                </li>

                <li class="sidebar-title">Settings</li>

                <li class="sidebar-item ">
                    <a href="{{ route('webmenu') }}" class='sidebar-link'>
                        <i class="bi bi-globe"></i>
                        <span>Web Menu</span>
                    </a>
                </li>

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-gear"></i>
                        <span>Authentication</span>
                    </a>
                    <ul class="submenu ">
                        <li class="submenu-item ">
                            <a href="component-alert.html">User</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-badge.html">Role</a>
                        </li>
                        <li class="submenu-item ">
                            <a href="component-breadcrumb.html">Permission</a>
                        </li>
                    </ul>

                    <li class="sidebar-item ">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-cloud"></i>
                            <span>Backup</span>
                        </a>
                    </li>

                    <li class="sidebar-item pb-5 pt-3 ">

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn btn-sm btn-block btn-primary float-end">
                            {{ __('Logout') }}
                        </button>
                    </form>
                    </li>


            </ul> 
        </div>
        <button class="sidebar-toggler btn x"><i class="bi bi-x"></i></button>
    </div>
</div>