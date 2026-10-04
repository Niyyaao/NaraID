@extends('layouts.buyer.app')

@section('title', 'Album Detail Page')

@section('content')
    <div class="page-head">
        <div>
            <h1>Album Detail</h1>
        </div>
        <a href="{{ route('buyer.album.index') }}" class="btn-back">
            <i class="fas fa-arrow-left mr-2"></i><span>Albums</span>
        </a>
    </div>


    <div class="card-body shadow mb-4 buyer-detail-content">
        <div class="buyer-detail-image-wrap">
            <img src="{{ asset('storage/albums/' . $album->image) }}" alt="{{ $album->title }}" class="buyer-detail-image">
            @if ($album->stock > 0)
                <span class="buyer-detail-badge badge-instock">In Stock</span>
            @else
                <span class="buyer-detail-badge badge-outstock">Sold Out</span>
            @endif
        </div>
        <div class="buyer-detail-info">
            <span class="buyer-detail-artist">{{ $album->artist_name }}</span>
            <h1 class="buyer-detail-title">{{ $album->title }}</h1>
            <div class="buyer-detail-price">IDR {{ number_format($album->price, 0, ',', '.') }}</div>
            <div class="buyer-detail-stock"><span>Stock : </span><strong>{{ $album->stock }} pcs</strong></div>
            <div class="buyer-detail-desc"><span>Description </span>
                <p>{{ $album->description }}</p>
            </div>
            <div class="buyer-actions">
                @if ($album->stock > 0)
                    <a href="{{ route('buyer.order.create.album', encrypt($album->id)) }}"
                        class="album-btn album-btn--primary px-4">
                        <span class="fas fa-shopping-bag"></span> Order
                    </a>
                @else
                    <span class="album-btn album-btn--disabled">
                        <span class="fas fa-ban"></span> Sold Out
                    </span>
                @endif
            </div>
        </div>
    </div>
@endsection
