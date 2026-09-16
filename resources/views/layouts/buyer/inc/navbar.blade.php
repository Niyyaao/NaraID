<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Logo -->
    <a class="navbar-brand font-weight-bold" href="{{ route('buyer.dashboard') }}">
        Nara.id
    </a>

    <!-- Menu utama -->
    <ul class="navbar-nav d-none d-md-flex flex-row mx-4">
        <li class="nav-item mx-2">
            <a class="nav-link font-weight-bold" href="{{ route('buyer.dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item mx-2">
            <a class="nav-link font-weight-bold" href="">Album</a>
        </li>
        <li class="nav-item mx-2">
            <a class="nav-link font-weight-bold" href="">My Order</a>
        </li>
    </ul>

    <!-- Search "Find" -->
    <form class="d-none d-sm-inline-block form-inline ml-auto my-2 my-md-0">
        <div class="input-group" style="width: 240px;">
            <input type="text" class="form-control bg-light border-0 small" placeholder="Find...">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                    <i class="fas fa-search fa-sm"></i>
                </button>
            </div>
        </div>
    </form>


    <!-- Topbar Navbar -->
    <ul class="navbar-nav">
        <div class="topbar-divider d-none d-sm-block"></div>
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">

                <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                <span
                    class="ml-2 d-none d-lg-inline text-gray-600 small">{{ Auth::guard('buyer')->user()->name }}</span>

            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="{{ route('buyer.profile') }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"
                    onclick="event.preventDefault(); document.getElementById('form-logout').submit();">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
                <form action="{{ route('logout') }}" id="form-logout" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>

    </ul>

</nav>
