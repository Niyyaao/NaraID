@extends('layouts.buyer.app')

@section('title', 'Album Page')

@section('content')
    <div class="hero-banner" style="background-image: url('{{ asset('img/hero-nara.png') }}');">
        <h1>Explore Albums</h1>
        <p>Find your favorite K-pop albums and pre-order them before they sell out.</p>
    </div>

    {{-- Search + filter --}}
    <form method="GET" action="{{ route('buyer.album.index') }}" class="album-toolbar">
        <input type="hidden" name="artist" value="{{ request('artist') }}">

        <div class="album-search">
            <i class="fas fa-search"></i>
            <input type="text" name="q" value="{{ request('q') }}" placeholder="Search album or artist...">
            <button type="submit">Search</button>
        </div>

        <div class="album-toolbar-row">
            <div class="album-price">
                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min" min="0">
                <span>–</span>
                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max" min="0">
                <button type="submit" class="album-price-go"><i class="fas fa-check"></i></button>
            </div>

            <select name="sort" onchange="this.form.submit()">
                <option value="">Newest</option>
                <option value="price_asc" @selected(request('sort') === 'price_asc')>Price: Low to High</option>
                <option value="price_desc" @selected(request('sort') === 'price_desc')>Price: High to Low</option>
                <option value="title" @selected(request('sort') === 'title')>Title: A to Z</option>
            </select>

            <label class="album-switch">
                <input type="checkbox" name="in_stock" value="1" @checked(request()->boolean('in_stock'))
                    onchange="this.form.submit()">
                <span class="album-switch-track"></span>
                In stock only
            </label>
        </div>
    </form>

    {{-- Artist chips --}}
    <div class="artist-chips">
        <a href="{{ request()->fullUrlWithQuery(['artist' => null, 'page' => null]) }}"
            class="artist-chip {{ request('artist') ? '' : 'active' }}">All</a>

        @foreach ($artists as $artist)
            <a href="{{ request()->fullUrlWithQuery(['artist' => $artist, 'page' => null]) }}"
                class="artist-chip {{ request('artist') === $artist ? 'active' : '' }}">{{ $artist }}</a>
        @endforeach
    </div>

    <div class="album-result-bar">
        <span>{{ $albums->total() }} album(s)</span>
        @if (request()->hasAny(['q', 'artist', 'min_price', 'max_price', 'in_stock', 'sort']))
            <a href="{{ route('buyer.album.index') }}"><i class="fas fa-times"></i> Clear filters</a>
        @endif
    </div>

    {{-- Grid --}}
    @if ($albums->count())
        <div class="album-grid">
            @foreach ($albums as $album)
                @php $soldOut = $album->stock <= 0; @endphp

                <div class="album-card {{ $soldOut ? 'is-soldout' : '' }}">
                    <a class="album-card-cover">
                        <img src="{{ asset('storage/albums/' . $album->image) }}"
                            onerror="this.src='{{ asset('images/default-cover.png') }}'" alt="{{ $album->title }}"
                            loading="lazy">

                        @if ($soldOut)
                            <span class="album-card-badge badge-outstock">Sold Out</span>
                        @elseif ($album->stock <= 5)
                            <span class="album-card-badge badge-lowstock">Only {{ $album->stock }} left</span>
                        @endif
                    </a>

                    <div class="album-card-body">
                        <span class="album-card-artist">{{ $album->artist_name }}</span>
                        <h3 class="album-card-title">{{ $album->title }}</h3>
                        <div class="album-card-price">IDR {{ number_format($album->price, 0, ',', '.') }}</div>

                        <div class="album-card-actions">
                            @if ($soldOut)
                                <span class="album-btn album-btn--disabled"><i class="fas fa-ban"></i> Sold Out</span>
                            @else
                                <a href="{{ route('buyer.order.create.album', encrypt($album->id)) }}"
                                    class="album-btn album-btn--primary">
                                    <i class="fas fa-shopping-bag"></i> Order
                                </a>
                            @endif

                            <a href="{{ route('buyer.album.show', encrypt($album->id)) }}"
                                class="album-btn album-btn--ghost" title="Detail">
                                <i class="fas fa-info"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="album-empty">
            <i class="fas fa-compact-disc"></i>
            <h5>No album found</h5>
            <p>Try another keyword or clear the filters.</p>
            <a href="{{ route('buyer.album.index') }}" class="album-btn album-btn--primary">Reset filters</a>
        </div>
    @endif

    <div class="d-flex justify-content-center mt-4">
        {{ $albums->links() }}
    </div>
@endsection
