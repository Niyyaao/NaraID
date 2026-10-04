@extends('layouts.buyer.app')

@section('title', 'Orders Page')

@section('content')

    @php
        $filters = [
            null => 'All',
            'awaiting_payment' => 'Waiting Payment',
            'awaiting_verification' => 'Verifying',
            'verified' => 'Paid',
            'ready_for_pickup' => 'Ready for Pickup',
            'finished' => 'Completed',
            'cancelled' => 'Cancelled',
        ];
    @endphp

    <div class="hero-banner" style="background-image: url('{{ asset('img/hero-nara.png') }}');">
        <h1>My Pre-Orders</h1>
        <p>Track your pre-orders and their payment status.</p>
    </div>
    <div class="new-order-card">
        <div class="new-order-icon">
            <i class="fas fa-compact-disc"></i>
        </div>
        <div class="new-order-text">
            <h5>Looking for another album?</h5>
            <p>Browse the latest releases and place a new pre-order.</p>
        </div>
        <a href="{{ route('buyer.order.create') }}" class="btn btn-order">
            <i class="fas fa-plus mr-1"></i> Make New Order
        </a>
    </div>
    
    <!-- Filter status -->
    <div class="status-filter">
        @foreach ($filters as $value => $label)
            <a href="{{ route('buyer.order.index', $value ? ['status' => $value] : []) }}"
                class="status-pill {{ $status === $value ? 'active' : '' }} ">
                {{ $label }}
            </a>
        @endforeach
    </div>

    <div class="card orders-card border-0 shadow-sm">
        <div class="table-responsive">
            <table class="table orders-table mb-0">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>ORDER</th>
                        <th>ALBUM</th>
                        <th class="text-center">QTY</th>
                        <th>TOTAL</th>
                        <th>STATUS</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($orders as $order)
                        <tr>
                            <td>{{ $orders->firstItem() + $loop->index }}</td>

                            <td>
                                <strong>#{{ $order->id }}</strong><br>
                                <small class="text-muted">{{ $order->created_at->format('d M Y') }}</small>
                            </td>

                            <td>{{ $order->album->title ?? '-' }}</td>

                            <td class="text-center">{{ $order->qty }}</td>

                            <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>

                            <td>
                                <span class="badge-status badge-{{ $order->status }}">
                                    {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                </span>
                            </td>

                            <td class="text-center">
                                <a href="{{ route('buyer.order.show', encrypt($order->id)) }}"
                                    class="btn btn-sm btn-outline-primary">
                                    <span class="fa fa-search"></span>
                                </a>
                                @if (in_array($order->status, ['awaiting_payment', 'awaiting_verification']))
                                    <a href="{{ route('buyer.order.payment', encrypt($order->id)) }}"
                                        class="btn btn-sm btn-primary">Pay</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                <i class="fa fa-box-open fa-2x mb-2 d-block"></i>
                                No orders found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $orders->links() }}
    </div>

@endsection
