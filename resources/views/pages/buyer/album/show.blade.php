@extends('layouts.buyer.app')

@section('title', 'Album Detail Page')

@section('content')
<div class="col-xl">
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
                <a href="#" class="btn btn-primary buyer-detail-order @if ($album->stock <= 0) disabled @endif"><span class="fas fa-shopping-bag"></span> {{ $album->stock > 0 ? 'Order' : 'Sold Out' }}</a>
                <a href="{{ route('buyer.album.index') }}" class="btn btn-secondary"><span class="fas fa-arrow-alt-circle-left"></span> Back</a>
            </div>
        </div>

    </div>
</div>
@endsection