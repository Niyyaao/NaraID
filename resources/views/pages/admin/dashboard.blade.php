@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('content')

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                TOTAL ADMINS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totaladmins }}</div>
                            <a class="text-xs font-weight-bold mb-1" href="{{ route('admin.admin.index') }}">See All</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-users-cog fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                TOTAL ALBUMS</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalalbums }}</div>
                            <a class="text-xs font-weight-bold mb-1" href="{{ route('admin.album.index') }}">See All</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-compact-disc fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TOTAL ORDERS
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalorders }}</div>
                                    <a class="text-xs font-weight-bold mb-1" href="{{ route('admin.order.index') }}">See All</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                TOTAL BUYER</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalbuyers }}</div>
                            <a class="text-xs font-weight-bold mb-1" href="{{ route('admin.buyer.index') }}">See All</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Best-selling Album</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse ($albumterlaris as $album)
                            <li class="list-group-item d-flex align-items-center">
                                
                                <img src="{{ asset('storage/albums/' . $album->image) }}"
                                    onerror="this.src='{{ asset('images/default-cover.png') }}'" class="rounded mr-3"
                                    width="45" height="45" style="object-fit: cover;">
                                <div class="flex-grow-1">
                                    <div class="font-weight-bold">{{ $album->title }}</div>
                                    <small class="text-muted">{{ $album->artist_name }}</small>
                                </div>
                                <span class="badge badge-success badge-pill">{{ $album->total_terjual }} sold</span>
                            </li>
                        @empty
                            <li class="list-group-item text-muted">No Sales Data Yet.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Latest Album</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse ($albumterbaru as $album)
                            <li class="list-group-item d-flex align-items-center">
                                <img src="{{ asset('storage/albums/' . $album->image) }}"
                                    onerror="this.src='{{ asset('images/default-cover.png') }}'" class="rounded mr-3"
                                    width="45" height="45" style="object-fit:cover;">
                                    <div class="flex-grow-1">
                                        <div class="font-weight-bold">{{ $album->title }}</div>
                                        <small class="text-muted">{{ $album->artist_name }} . {{ $album->release_date?->format('M Y') }}</small>
                                    </div>
                            </li>
                        @empty
                        <li class="list-group-item text-muted">No Albums Yet.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>

@endsection
