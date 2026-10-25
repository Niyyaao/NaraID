@extends('layouts.admin.app')

@section('title', 'Album Details Page')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 admin-page-title">ALBUM DETAIL</h1>
</div>

<div class="admin-detail-card">
    <div class="card-body">

        <div class="admin-detail-row">
            <label>ID</label>
            <input type="text" value="{{ $album->id }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Title</label>
            <input type="text" value="{{ $album->title }}" readonly>
        </div>


        <div class="admin-detail-row">
            <label>Release Date</label>
            <input type="text"
                value="{{ $album->release_date ? $album->release_date->format('d F Y') : 'Not Specified' }}" readonly>
        </div>


        <div class="admin-detail-row">
            <label>Artist</label>
            <input type="text" value="{{ $album->artist_name }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Price</label>
            <input type="text" value="{{ $album->price }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Stock</label>
            <input type="text" value="{{ $album->stock }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Description</label>
            <input type="text" value="{{ $album->description }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Created At</label>
            <input type="text" value="{{ $album->created_at }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Updated At</label>
            <input type="text" value="{{ $album->updated_at }}" readonly>
        </div>

        <div class="admin-detail-row">
            <img src="{{ asset('storage/albums/' . $album->image) }}" alt="{{ $album->title }}" width="150"
                height="150" style="object-fit: cover; border-radius: 8px;">
        </div>

        <div class="admin-card mt-4">
            <div class="card-body">
                <h5 class="mb-3">
                    Orders
                    <span class="badge badge-secondary">{{ $album->orders->count() }}</span>
                </h5>

                <div class="list-group list-group-flush">
                    @forelse ($album->orders as $order)
                    <a href="{{ route('admin.order.show', encrypt($order->id)) }}"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0">
                        <div>
                            <strong>#{{ $order->id }}</strong>
                            <span class="mx-1">·</span>{{ $order->buyer?->name ?? '-' }}
                            <br>
                            <small class="text-muted">
                                {{ $order->created_at->format('d M Y, H:i') }}
                                · Qty {{ $order->qty }}
                                · IDR {{ number_format($order->total, 0, ',', '.') }}
                            </small>
                        </div>
                        <span class="badge-status badge-{{ $order->status }}">
                            {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                        </span>
                    </a>
                    @empty
                    <div class="text-center text-muted py-4">
                        <i class="fa fa-box-open fa-2x mb-2 d-block"></i>
                        No orders for this album yet.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="admin-actions">

            <a href="{{ route('admin.album.edit', encrypt($album->id)) }}" class="btn btn-primary">
                <span class="fa fa-edit"></span>
                Edit
            </a>

            <a href="{{ route('admin.album.index') }}" class="btn btn-secondary">
                <span class="fa fa-times-circle"></span>
                Cancel
            </a>

            <a href="javascript:void(0)"
                onclick="handleDestroy('{{ route('admin.album.destroy', encrypt($album->id)) }}', @js('Album : ' . $album->title))"
                class="btn btn-danger">
                <span class="fa fa-trash"></span>
                Delete
            </a>

        </div>

    </div>
</div>

<form id="form-destroy" action="" method="POST" style="display: none;">
    @csrf
    @method('DELETE')
</form>

<hr>

@endsection