<nav class="navbar navbar-expand-md navbar-light bg-white topbar mb-4 fixed-top shadow">
    <div class="container-fluid">
        {{-- <!-- Navbar Toggle (Topbar) --> --}}
        <button id="navbar-toggler" class="btn btn-link d-md-none rounded-circle mr-3" type="button" data-toggle="collapse"
            data-target="#navbarmenu" aria-controls="navbarmenu" aria-expanded="false" aria-label="Toggle Navigation">
            <i class="fa fa-bars"></i>
        </button>

        {{-- <!-- Logo --> --}}
        <a class="navbar-brand font-weight-bold" href="{{ route('buyer.dashboard') }}">
            NARA.ID
        </a>

        <div class="collapse navbar-collapse" id="navbarmenu">
            {{-- <!-- Menu utama --> --}}
            <ul class="navbar-nav mx-md-4 mb-2 mb-md-0">
                <li class="nav-item mx-md-3">
                    <a class="nav-link font-weight-bold {{ request()->routeIs('buyer.dashboard') ? 'active' : '' }}"
                        href="{{ route('buyer.dashboard') }}">Dashboard</a>
                </li>
                <li class="nav-item mx-md-3">
                    <a class="nav-link font-weight-bold {{ request()->routeIs('buyer.album.*') ? 'active' : '' }}"
                        href="{{ route('buyer.album.index') }}">Album</a>
                </li>
                <li class="nav-item mx-md-3">
                    <a class="nav-link font-weight-bold {{ request()->routeIs('buyer.order.*') ? 'active' : '' }}"
                        href="{{ route('buyer.order.index') }}">My Order</a>
                </li>
            </ul>

            {{-- <!-- Search "Find" --> --}}
            <form class="d-flex ml-md-auto mb-2 mb-md-0" role="search">
                <div class="input-group" style="max-width: 240px;">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Find...">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </form>

            <div class="topbar-divider d-none d-md-block mx-3"></div>

            {{-- <!-- Topbar Navbar --> --}}
            <ul class="navbar-nav">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <img class="img-profile rounded-circle" src="{{ asset('img/undraw_profile.svg') }}">
                        <span
                            class="ml-2 d-none d-lg-inline text-gray-600 small">{{ Auth::guard('buyer')->user()->name }}</span>

                    </a>
                    {{-- <!-- Dropdown - User Information --> --}}
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
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
        </div>
    </div>
</nav>
