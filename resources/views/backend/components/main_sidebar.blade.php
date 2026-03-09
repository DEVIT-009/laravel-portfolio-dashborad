<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset('backend_assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('backend_assets/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('backend.index') }}" class="nav-link {{ request()->routeIs('backend.index') ? 'active' : '' }}">
                    <i class="fas fa-chart-line nav-icon"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
{{--                Department --}}
                <li class="nav-item {{ request()->routeIs('backend.department.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('backend.department.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Departments
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- List -->
                        <li class="nav-item">
                            <a href="{{ route('backend.department.index') }}"
                               class="nav-link {{ request()->routeIs('backend.department.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Departments</p>
                            </a>
                        </li>

                        <!-- Create -->
                        <li class="nav-item">
                            <a href="{{ route('backend.department.create') }}"
                               class="nav-link {{ request()->routeIs('backend.department.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Department</p>
                            </a>
                        </li>
                    </ul>
                </li>
{{--                Position --}}
                <li class="nav-item {{ request()->routeIs('backend.position.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('backend.position.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Positions
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- List -->
                        <li class="nav-item">
                            <a href="{{ route('backend.position.index') }}"
                               class="nav-link {{ request()->routeIs('backend.position.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Position</p>
                            </a>
                        </li>

                        <!-- Create -->
                        <li class="nav-item">
                            <a href="{{ route('backend.position.create') }}"
                               class="nav-link {{ request()->routeIs('backend.position.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Position</p>
                            </a>
                        </li>
                    </ul>
                </li>
{{--                Employee --}}
                <li class="nav-item {{ request()->routeIs('backend.employee.*') ? 'menu-open' : '' }}">
                    <a href="#" class="nav-link {{ request()->routeIs('backend.employee.*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Employees
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- List -->
                        <li class="nav-item">
                            <a href="{{ route('backend.employee.index') }}"
                               class="nav-link {{ request()->routeIs('backend.employee.index') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>List Employee</p>
                            </a>
                        </li>

                        <!-- Create -->
                        <li class="nav-item">
                            <a href="{{ route('backend.employee.create') }}"
                               class="nav-link {{ request()->routeIs('backend.employee.create') ? 'active' : '' }}">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Create Employee</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
