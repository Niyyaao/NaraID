@extends('layouts.buyer.app')

@section('title', 'Dashboard Page')

@section('content')
    <!-- Hero -->
    <div class="hero-banner" style="background-image: url('{{ asset('img/hero-nara.png') }}');">
        <h1>Welcome back, {{ auth()->user()->name }}!</h1>
        <p>Ready to grab your next album? Here's what's happening on Nara.id.</p>
    </div>

    <!-- Stats Row -->
    <div class="row">

        <!-- Total Order -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card stat-total shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold stat-label text-uppercase mb-1">TOTAL ORDER</div>
                            <div class="h5 mb-0 font-weight-bold stat-number">{{ $totalorder }}</div>
                            <a class="text-xs font-weight-bold mb-1 stat-link" href="{{ route('buyer.order.index') }}">See
                                All</a>
                        </div>
                        <div class="col-auto"><i class="fas fa-fw fa-shopping-cart fa-2x stat-icon"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Awaiting Payment -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card stat-awaiting shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold stat-label text-uppercase mb-1">AWAITING PAYMENT</div>
                            <div class="h5 mb-0 font-weight-bold stat-number">{{ $awaitingpayment }}</div>
                            <a class="text-xs font-weight-bold mb-1 stat-link"
                                href="{{ route('buyer.order.index', ['status' => 'awaiting_payment']) }}">See Detail</a>
                        </div>
                        <div class="col-auto"><i class="fas fa-fw fa-clock fa-2x stat-icon"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Ready for Pickup -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card stat-ready shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold stat-label text-uppercase mb-1">READY FOR PICKUP</div>
                            <div class="h5 mb-0 font-weight-bold stat-number">{{ $readyforpickup }}</div>
                            <a class="text-xs font-weight-bold mb-1 stat-link"
                                href="{{ route('buyer.order.index', ['status' => 'ready_for_pickup']) }}">See Detail</a>
                        </div>
                        <div class="col-auto"><i class="fas fa-fw fa-box-open fa-2x stat-icon"></i></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Finished -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card stat-card stat-finished shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold stat-label text-uppercase mb-1">FINISHED</div>
                            <div class="h5 mb-0 font-weight-bold stat-number">{{ $finished }}</div>
                            <a class="text-xs font-weight-bold mb-1 stat-link"
                                href="{{ route('buyer.order.index', ['status' => 'finished']) }}">See All</a>
                        </div>
                        <div class="col-auto"><i class="fas fa-fw fa-check-circle fa-2x stat-icon"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Latest Album Carousel -->
    <div class="section-head">
        <h5><i class="fas fa-compact-disc mr-2 text-primary"></i>Latest Album</h5>
    </div>

    @if ($albumterbaru->count())
        <div id="latestCarousel" class="carousel slide mb-5" data-ride="carousel" data-interval="4000">
            <ol class="carousel-indicators">
                @foreach ($albumterbaru as $album)
                    <li data-target="#latestCarousel" data-slide-to="{{ $loop->index }}"
                        class="{{ $loop->first ? 'active' : '' }}"></li>
                @endforeach
            </ol>

            <div class="carousel-inner">
                @foreach ($albumterbaru as $album)
                    @php $cover = asset('storage/albums/' . $album->image); @endphp
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                        <div class="latest-slide">
                            <div class="latest-slide-bg" style="background-image: url('{{ $cover }}')"></div>
                            <div class="latest-slide-content">
                                <img src="{{ $cover }}"
                                    onerror="this.src='{{ asset('images/default-cover.png') }}'"
                                    alt="{{ $album->title }}">
                                <div class="latest-slide-info">
                                    <span class="badge-new">NEW RELEASE</span>
                                    <h3>{{ $album->title }}</h3>
                                    <p>{{ $album->artist_name }}</p>
                                    <p class="small">{{ $album->release_date?->format('d M Y') }}</p>
                                    <a href="{{ route('buyer.album.show', encrypt($album->id)) }}" class="btn-detail">
                                        View Detail <i class="fas fa-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <a class="carousel-control-prev" href="#latestCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#latestCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    @else
        <div class="text-muted p-3 mb-5">No Albums Yet.</div>
    @endif

    <!-- Best-selling Album -->
    <div class="section-head">
        <h5><i class="fas fa-fire mr-2 text-primary"></i>Best-selling Album</h5>
    </div>
    @php $maxSold = max(1, (int) $albumterlaris->max('total_terjual')); @endphp
    <div class="rank-card mb-4">
        @forelse ($albumterlaris as $album)
            <div class="rank-item {{ $loop->first ? 'is-first' : '' }}">
                <div class="rank-no {{ $loop->iteration <= 3 ? 'rank-' . $loop->iteration : '' }}">
                    @if ($loop->first)
                        <i class="fas fa-crown"></i>
                    @else
                        {{ $loop->iteration }}
                    @endif
                </div>

                <img class="rank-cover" src="{{ asset('storage/albums/' . $album->image) }}"
                    onerror="this.src='{{ asset('images/default-cover.png') }}'" alt="{{ $album->title }}">

                <div class="rank-main">
                    <div class="rank-title">{{ $album->title }}</div>
                    <div class="rank-artist">{{ $album->artist_name }}</div>
                    <div class="rank-bar">
                        <span style="width: {{ round(($album->total_terjual / $maxSold) * 100) }}%"></span>
                    </div>
                </div>

                <div class="rank-sold">
                    <span class="num">{{ $album->total_terjual }}</span>
                    <span class="label">sold</span>
                </div>
                <a href="{{ route('buyer.album.show', encrypt($album->id)) }}" class="rank-go stretched-link"
                    title="View {{ $album->title }}">
                    <i class="fas fa-chevron-right"></i>
                </a>
            </div>
        @empty
            <div class="p-4 text-muted">No Sales Data Yet.</div>
        @endforelse
    </div>
@endsection
