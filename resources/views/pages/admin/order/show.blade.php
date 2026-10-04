@extends('layouts.admin.app')

@section('title', 'Order Details Page - Admin Dashboard')

@section('content')

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 admin-page-title">ORDER DETAIL</h1>
</div>

<div class="admin-detail-card">
    <div class="card-body">

        <div class="admin-detail-row">
            <label>Order ID</label>
            <input type="text" value="{{ $order->id }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Buyer Name</label>
            <input type="text" value="{{ $order->buyer?->name ?? '-' }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Buyer Email</label>
            <input type="text" value="{{ $order->buyer->email ?? '-' }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Buyer Phone</label>
            <input type="text" value="{{ $order->buyer->phone ?? '-' }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Album</label>
            <input type="text" value="{{ $order->album->title ?? '-' }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Qty</label>
            <input type="text" value="{{ $order->qty }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Total</label>
            <input type="text" value="IDR {{ number_format($order->total, 0, ',', '.') }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Status</label>
            <input type="text" value="{{ ucfirst(str_replace('_', ' ', $order->status)) }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Created At</label>
            <input type="text" value="{{ $order->created_at }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Updated At</label>
            <input type="text" value="{{ $order->updated_at }}" readonly>
        </div>

        <div class="admin-detail-row">
            <label>Payment Proof</label>
            @if ($order->payment_proof)
            <div class="mb-2">
                <img src="{{ asset('storage/orders/' . $order->payment_proof) }}" alt="Payment Proof" width="150"
                    height="150" style="object-fit: cover; border-radius: 8px; margin-right: 30px;">
            </div>
            @else
            <em class="text-muted">No Payment Proof Uploaded</em>
            @endif
        </div>

        <div class="admin-actions">

            <a href="{{ route('admin.order.edit', encrypt($order->id)) }}" class="btn btn-primary">
                <span class="fa fa-edit"></span>
                Edit
            </a>

            <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">
                <span class="fa fa-times-circle"></span>
                Cancel
            </a>
            <a href="javascript:void(0)"
                onclick="handleDestroy('{{ route('admin.order.destroy', encrypt($order->id)) }}', @js('Order With ID : '. $order->id))"
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

