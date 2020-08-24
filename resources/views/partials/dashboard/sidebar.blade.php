<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('backend/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="{{ url('dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                
                </li>
                <li class="nav-item">
                    <a href="{{ route('category.index') }}" class="nav-link {{ Request::is('category') ? 'active' : null }}">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            All Categories
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ url('category/create') }}" class="nav-link {{ Request::is('category/create') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Add Category
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ url('brand') }}" class="nav-link {{ Request::is('brand') ? 'active' : null }}">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            All Brands
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{ url('brand/create') }}" class="nav-link {{ Request::is('brand/create') ? 'active' : null }}">
                        <i class="nav-icon fas fa-tree"></i>
                        <p>
                            Add Brand
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{ Request::is('product*') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Products 
                            <span class="right badge badge-danger">New</span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('product/create') }}" class="nav-link {{ Request::is('product/create') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('product') }}" class="nav-link {{ Request::is('product') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Products</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link {{ Request::is('slider*') ? 'active' : null }}">
                        <i class="nav-icon fas fa-edit"></i>
                        <p>
                            Sliders 
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('slider/create') }}" class="nav-link {{ Request::is('slider/create') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Add Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('slider') }}" class="nav-link {{ Request::is('slider') ? 'active' : null }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>All Sliders</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ url('order') }}" class="nav-link {{ Request::is('order') ? 'active' : null }}">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Manage Order
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/gallery.html" class="nav-link">
                        <i class="nav-icon far fa-image"></i>
                        <p>
                            Shop Name
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon far fa-envelope"></i>
                        <p>
                            Delivery Man
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>