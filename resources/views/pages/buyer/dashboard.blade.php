@extends('layouts.buyer.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Welcome to Nara.id</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Total Order -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                TOTAL ORDER</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalorder }}</div>
                            <a class="text-xs font-weight-bold mb-1" href="">See All</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-shopping-cart fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Awaiting Payment -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                AWAITING PAYMENT</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $awaitingpayment }}</div>
                            <a class="text-xs font-weight-bold mb-1" href="">See Detail</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-clock fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ready for Pickup -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                READY FOR PICKUP</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $readyforpickup }}</div>
                            <a class="text-xs font-weight-bold mb-1" href="">See Detail</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-box-open fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Finished -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                FINISHED</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $finished }}</div>
                            <a class="text-xs font-weight-bold mb-1" href="">See All</a>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-fw fa-check-circle fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Best-selling Album -->
        <div class="col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Best-selling Album</h6>
                </div>
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

        <!-- Latest Album -->
        <div class="col-xl-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Latest Album</h6>
                </div>
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @forelse ($albumterbaru as $album)
                            <li class="list-group-item d-flex align-items-center">
                                <img src="{{ asset('storage/albums/' . $album->image) }}"
                                    onerror="this.src='{{ asset('images/default-cover.png') }}'" class="rounded mr-3"
                                    width="45" height="45" style="object-fit:cover;">
                                <div class="flex-grow-1">
                                    <div class="font-weight-bold">{{ $album->title }}</div>
                                    <small class="text-muted">{{ $album->artist_name }} .
                                        {{ $album->release_date?->format('M Y') }}</small>
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
