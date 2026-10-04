@extends('layouts.buyer.app')

@section('title', 'Payment Page')

@section('content')

    <div class="page-head">
        <div>
            <h1>Payment</h1>
            <p>Complete your payment and upload the proof.</p>
        </div>
        <a href="{{ route('buyer.order.index') }}" class="btn-back">
            <i class="fas fa-arrow-left mr-2"></i><span>My Orders</span>
        </a>
    </div>


    <div class="card shadow mb-4">
        <div class="card-body">
            {{-- ORDER SUMMARY --}}
            <div class="order-item mb-4">
                <div class="order-item-image">
                    @if ($order->album?->image)
                        <img src="{{ asset('storage/albums/' . $order->album->image) }}" alt="{{ $order->album->title }}">
                    @else
                        <i class="fas fa-compact-disc"></i>
                    @endif
                </div>

                <div class="order-item-body">
                    <div class="order-item-title">{{ $order->album->title ?? '-' }}</div>
                    <div class="text-muted mb-1">Order #{{ $order->id }}</div>
                    <div class="text-muted mb-3">Qty: {{ $order->qty }}</div>

                    <div class="order-item-total">
                        <span class="text-muted">Total to pay</span>
                        <span class="amount">IDR {{ number_format($order->total, 0, ',', '.') }}</span>
                    </div>

                    <div class="mt-3">
                        <span class="order-status order-status--{{ $order->status }}">
                            {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                        </span>
                    </div>
                </div>
            </div>

            @if ($order->status === 'awaiting_payment' || $order->status === 'awaiting_verification')

                {{-- PAYMENT INSTRUCTIONS --}}
                <div class="payment-box mb-4">
                    <h6 class="text-uppercase text-muted small font-weight-bold mb-3">How to pay</h6>
                    <ol class="pl-3 mb-3">
                        <li>Transfer the exact total to the account below.</li>
                        <li>Take a screenshot or photo of the transfer receipt.</li>
                        <li>Upload it using the form below.</li>
                    </ol>

                    <div class="payment-account">
                        <div class="small text-muted">Bank Name</div>
                        <div class="font-weight-bold">BANK NAME HERE</div>
                        <div class="small text-muted mt-2">Account Number</div>
                        <div class="font-weight-bold">0000000000</div>
                        <div class="small text-muted mt-2">Account Holder</div>
                        <div class="font-weight-bold">ACCOUNT HOLDER NAME</div>
                    </div>

                    @if ($order->status === 'awaiting_payment')
                        <p class="text-danger small mt-3 mb-0">
                            Pay before {{ $order->created_at->addDay()->format('d M Y H:i') }}, otherwise the
                            order will be cancelled automatically.
                        </p>
                    @endif
                </div>

                {{-- UPLOAD FORM --}}
                <form action="{{ route('buyer.order.payment.upload', encrypt($order->id)) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf

                    <h6 class="text-uppercase text-muted small font-weight-bold mb-3">Payment proof</h6>

                    @if ($order->payment_proof)
                        <div class="mb-3">
                            <img src="{{ asset('storage/orders/' . $order->payment_proof) }}" alt="Payment Proof"
                                width="150" height="150" style="object-fit: cover; border-radius: 8px;">
                            <div class="small text-muted mt-1">Current proof. Upload a new one to replace it.</div>
                        </div>
                    @endif

                    <div class="mb-3">
                        <input type="file" name="payment_proof" id="payment_proof" accept="image/png,image/jpeg"
                            class="form-control-file @error('payment_proof') is-invalid @enderror" required>
                        <small class="form-text text-muted">JPG or PNG, max 2 MB.</small>
                        @error('payment_proof')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                    </div>

                    <img id="proofPreview" src="" alt="Preview" width="150" height="150"
                        style="display: none; object-fit: cover; border-radius: 8px;" class="mb-3">

                    <div class="d-flex justify-content-end" style="gap: 12px;">
                        <button type="submit" class="btn btn-primary px-4">Submit Payment Proof</button>
                    </div>
                </form>
            @elseif ($order->status === 'cancelled')
                <div class="alert alert-danger mb-0">This order has been cancelled.</div>
            @else
                <div class="alert alert-info mb-0">
                    Your payment has been verified. You can track the order status in your order list.
                </div>
            @endif

        </div>
    </div>


    <script>
        document.getElementById('payment_proof')?.addEventListener('change', function() {
            const preview = document.getElementById('proofPreview');
            const file = this.files[0];

            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            } else {
                preview.style.display = 'none';
            }
        });
    </script>
@endsection
