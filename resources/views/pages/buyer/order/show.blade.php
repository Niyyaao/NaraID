@extends('layouts.buyer.app')

@section('title', 'Order Details Page')

@section('content')

    @php
        $steps = [
            'awaiting_payment' => ['label' => 'Awaiting Payment', 'icon' => 'fa-wallet'],
            'awaiting_verification' => ['label' => 'Awaiting Verification', 'icon' => 'fa-hourglass-half'],
            'verified' => ['label' => 'Verified', 'icon' => 'fa-check-circle'],
            'ready_for_pickup' => ['label' => 'Ready for Pickup', 'icon' => 'fa-store'],
            'finished' => ['label' => 'Finished', 'icon' => 'fa-flag-checkered'],
        ];

        $stepKeys = array_keys($steps);
        $currentStep = array_search($order->status, $stepKeys);

        $statusLabels = $steps + [
            'cancelled' => ['label' => 'Cancelled', 'icon' => 'fa-times-circle'],
        ];

        $statusNotes = [
            'awaiting_payment' =>
                'Please transfer the total amount to our bank account, then upload your payment proof.',
            'awaiting_verification' => 'We have received your payment proof. Our team is verifying it.',
            'verified' => 'Your payment has been verified. We are preparing your album.',
            'ready_for_pickup' => 'Your album is ready! Please pick it up at our store.',
            'finished' => 'Order completed. Thank you for shopping at Nara.Id!',
            'cancelled' => 'This order has been cancelled.',
        ];
    @endphp
    <div class="page-head">
        <div>
            <h1>Order Detail</h1>
            <p>Order #{{ $order->id }}</p>
        </div>
        <a href="{{ route('buyer.order.index') }}" class="btn-back">
            <i class="fas fa-arrow-left mr-2"></i><span>My Orders</span>
        </a>
    </div>

    <div class="order-detail-card">

        {{-- Progress tracker --}}
        @if ($currentStep !== false)
            <div class="order-tracker">
                @foreach ($steps as $key => $step)
                    @php $i = $loop->index; @endphp
                    <div
                        class="order-tracker-step {{ $i < $currentStep ? 'is-done' : '' }} {{ $i === $currentStep ? 'is-active' : '' }}">
                        <div class="order-tracker-icon">
                            <i class="fas {{ $i < $currentStep ? 'fa-check' : $step['icon'] }}"></i>
                        </div>
                        <span>{{ $step['label'] }}</span>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Status note --}}
        @if (isset($statusNotes[$order->status]))
            <div class="order-note order-note--{{ $order->status }}">
                <i class="fas fa-info-circle"></i>
                <span>{{ $statusNotes[$order->status] }}</span>
            </div>
        @endif

        {{-- Pickup info --}}
        @if ($order->status === 'ready_for_pickup')
            <div class="pickup-card">
                <div class="pickup-card-icon">
                    <i class="fas fa-store"></i>
                </div>

                <div class="pickup-card-body">
                    <h5>Pickup Location</h5>
                    <strong>Nara.Id Store</strong>
                    <p>Jl. Contoh Raya No. 123, Ungaran, Kab. Semarang, Jawa Tengah</p>

                    <div class="pickup-card-meta">
                        <span><i class="far fa-clock"></i> Mon – Sat, 10:00 – 20:00</span>
                        <span><i class="fas fa-phone-alt"></i> 0812-3456-7890</span>
                    </div>

                    <small>Please show your Order ID <b>#{{ $order->id }}</b> when picking up.</small>
                </div>

                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode('Jl. Contoh Raya No. 123, Ungaran') }}"
                    target="_blank" rel="noopener" class="btn btn-sm pickup-card-btn">
                    <i class="fas fa-map-marker-alt mr-1"></i> Open in Maps
                </a>
            </div>
        @endif

        {{-- Summary --}}
        <div class="order-summary">
            <div class="order-summary-album">
                <small>Album</small>
                <h4>{{ $order->album?->title ?? '-' }}</h4>
                <span>Qty: {{ $order->qty }}</span>
            </div>
            <div class="order-summary-total">
                <small>Total</small>
                <strong>IDR {{ number_format($order->total, 0, ',', '.') }}</strong>
            </div>
        </div>

        <div class="order-detail-content">

            <div class="order-detail-info">

                <div class="order-detail-row">
                    <label>Buyer Name</label>
                    <span>{{ $order->buyer?->name ?? '-' }}</span>
                </div>

                <div class="order-detail-row">
                    <label>Buyer Email</label>
                    <span>{{ $order->buyer?->email ?? '-' }}</span>
                </div>

                <div class="order-detail-row">
                    <label>Buyer Phone</label>
                    <span>{{ $order->buyer?->phone ?? '-' }}</span>
                </div>

                <div class="order-detail-row">
                    <label>Last Updated</label>
                    <span>{{ $order->updated_at->format('d M Y, H:i') }}</span>
                </div>

            </div>

            <div class="order-payment-proof">

                <h5>Payment Proof</h5>

                @if ($order->payment_proof)
                    <a href="{{ asset('storage/orders/' . $order->payment_proof) }}" target="_blank">
                        <img src="{{ asset('storage/orders/' . $order->payment_proof) }}" alt="Payment Proof"
                            class="payment-proof-image">
                    </a>
                    <small class="payment-proof-hint">Click to view full size</small>
                @else
                    <div class="payment-proof-empty">
                        <i class="fas fa-image"></i>
                        <span>No Payment Proof Uploaded</span>
                    </div>
                @endif

            </div>

        </div>
        @if (in_array($order->status, ['awaiting_payment', 'awaiting_verification']))
            <a href="{{ route('buyer.order.payment', encrypt($order->id)) }}" class="btn btn-sm btn-primary my-2 px-4">Pay</a>
        @endif
    </div>

@endsection
