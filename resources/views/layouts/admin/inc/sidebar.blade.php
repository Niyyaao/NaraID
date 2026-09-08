<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">NaraID</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Album List -->
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('admin.album.index') }}">
            <i class="fas fa-fw fa-compact-disc"></i>
            <span>Album List</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Order List -->
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Order List</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Buyer List -->
    <li class="nav-item active">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-users"></i>
            <span>Buyer List</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Admin -->
    <li class="nav-item active">
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
