@php
    $company = Auth::guard('company')->user();
@endphp

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('Company.dashboard')}}"" class="brand-link">
        <img src="{{ asset('company/assets/dist/img/company.jpeg') }}" alt=" "
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Company Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset($company->logo) }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="{{ route('Company.profile') }}" class="d-block">{{ $company->name }}</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                    aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
       with font-awesome or any other icon font library -->
                <li class="nav-item @if (request()->is('Company/dashboard')) active @endif">
                    <a href="{{ route('Company.dashboard') }}"
                        class="nav-link @if (request()->route()->getName() === 'Company.dashboard') active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>


                <li class="nav-item @if (request()->is('Company/post*')) menu-open @endif">
                    <a href="#"
                       class="nav-link  @if (request()->is('Company/post.*')) active @endif">
                        <p>Post <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('Company.post.index')}}" class="nav-link @if (request()->is('Company/posts')) active @endif">
                                <i class="fas fa-folder-open nav-icon"></i>
                                <p>Listing Post</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('Company.post.create')}}" class="nav-link @if (request()->is('Company/post/create')) active @endif">
                                <i class="fas fa-folder-open nav-icon"></i>
                                <p>Add Post</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="nav-link btn btn-warning">
                            <i class='fas fa-sign-out-alt'></i>
                            <p>logout</p>
                        </button>
                    </form>

                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
