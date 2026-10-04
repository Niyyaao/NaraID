<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('img/logo1.png') }}" alt="NARA.ID">
        </div>
        
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Album List -->
    <li class="nav-item {{ request()->routeIs('admin.album.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.album.index') }}">
            <i class="fas fa-fw fa-compact-disc"></i>
            <span>Album List</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Order List -->
    <li class="nav-item {{ request()->routeIs('admin.order.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.order.index') }}">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Order List</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Buyer List -->
    <li class="nav-item {{ request()->routeIs('admin.buyer.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.buyer.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Buyer List</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Admin -->
    <li class="nav-item {{ request()->routeIs('admin.admin.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('admin.admin.index') }}">
            <i class="fas fa-fw fa-users-cog"></i>
            <span>Admin </span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
