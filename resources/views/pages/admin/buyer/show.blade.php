@extends('layouts.admin.app')

@section('title', 'Buyer Details Page - Admin Dashboard')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 admin-page-title">BUYER DETAIL</h1>
</div>

<div class="admin-detail-card">
    <div class="card-body">

        <div class="admin-detail-row">
            <label>ID</label>
            <input type="text" value="{{ $buyer->id }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Name</label>
            <input type="text" value="{{ $buyer->name }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Email</label>
            <input type="text" value="{{ $buyer->email }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Phone</label>
            <input type="text" value="{{ $buyer->phone }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Created At</label>
            <input type="text" value="{{ $buyer->created_at }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Updated At</label>
            <input type="text" value="{{ $buyer->updated_at }}" readonly>
        </div>

        <div class="admin-card mt-4">
            <div class="card-body">
                <h5 class="mb-3">
                    Orders
                    <span class="badge badge-secondary">{{ $buyer->orders->count() }}</span>
                </h5>

                <div class="list-group list-group-flush">
                    @forelse ($buyer->orders as $order)
                    <a href="{{ route('admin.order.show', encrypt($order->id)) }}"
                        class="list-group-item list-group-item-action d-flex justify-content-between align-items-center px-0">
                        <div>
                            <strong>#{{ $order->id }}</strong>
                            <span class="mx-1">·</span>{{ $order->album?->title ?? '-' }}
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
                        This buyer hasn't placed any orders yet.
                    </div>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="admin-actions">

            <a href="{{ route('admin.buyer.index') }}" class="btn btn-secondary">
                <span class="fa fa-times-circle"></span>
                Cancel
            </a>

            <a href="javascript:void(0)"
                onclick="handleDestroy('{{ route('admin.buyer.destroy', encrypt($buyer->id)) }}', @js('Buyer : ' . $buyer->name))"
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
@endsection