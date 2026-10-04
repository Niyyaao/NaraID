<nav class="navbar navbar-expand-md navbar-light bg-white topbar mb-4 fixed-top shadow">
    <div class="container-fluid">
        {{-- <!-- Navbar Toggle (Topbar) --> --}}
        <button id="navbar-toggler" class="btn btn-link d-md-none rounded-circle mr-3" type="button" data-toggle="collapse"
            data-target="#navbarmenu" aria-controls="navbarmenu" aria-expanded="false" aria-label="Toggle Navigation">
            <i class="fa fa-bars"></i>
        </button>

        {{-- <!-- Logo --> --}}
        <a class="navbar-brand font-weight-bold" href="{{ route('buyer.dashboard') }}">
            <img src="{{ asset('img/logo3.png') }}" alt="NARA.ID" style="width: 120px; height: auto;">
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


            {{-- <!-- Topbar Navbar --> --}}
            <ul class="navbar-nav ml-md-auto">
                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        @php
                            $name = Auth::guard('buyer')->user()->name;
                            $initial = strtoupper(substr($name, 0, 1));

                            $colors = ['#1e3a6e', '#526F82', '#3f5d8a', '#2f6f8f', '#45607f', '#5a7fa6'];

                            $color = $colors[ord($initial) % count($colors)];
                        @endphp

                        <div class="img-profile rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 36px; height: 36px; background-color: {{ $color }}; color: white; font-weight: 600;">
                            {{ $initial }}
                        </div>
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
                        <form action="{{ route('buyer.logout') }}" id="form-logout" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
