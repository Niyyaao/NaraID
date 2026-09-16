@extends('layouts.admin.app')

@section('title', 'Order Status Edit - Admin Dashboard')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 admin-page-title">Order Status Edit</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="admin-form-card">
                <form action="{{ route('admin.order.update', encrypt($order->id)) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="admin-form-group">
                            <label for="id" class="form-label">Order ID</label>
                            <div class="admin-form-input">
                                <input type="text" id="id" value="{{ $order->id }}" class="form-control"
                                    style="background-color: transparent;" readonly>
                            </div>
                        </div>

                        <div class="admin-form-group">
                            <label for="buyer_id" class="form-label">Buyer</label>
                            <div class="admin-form-input">
                                <input type="text" id="buyer_id" value="{{ $order->buyer->name }}" class="form-control"
                                    style="background-color: transparent;" readonly>
                            </div>
                        </div>
                        <div class="admin-form-group">
                            <label for="album_id" class="form-label">Album</label>
                            <div class="admin-form-input">
                                <input type="text" id="album_id" value="{{ $order->album->title }}" class="form-control"
                                    style=" background-color: transparent;" readonly>
                            </div>
                        </div>
                        <div class="admin-form-group">
                            <label for="qty" class="form-label">Qty</label>
                            <div class="admin-form-input">
                                <input type="number" id="qty" value="{{ number_format($order->qty, 0, ',', '.') }}"
                                    class="form-control" style="background-color: transparent;" readonly>
                            </div>
                        </div>
                        <div class="admin-form-group">
                            <label for="total" class="form-label">Total</label>
                            <div class="admin-form-input">
                                <input type="text" id="total"
                                    value="IDR {{ number_format($order->total, 0, ',', '.') }}" class="form-control"
                                    style="background-color: transparent;" readonly>
                            </div>
                        </div>
                        <div class="admin-form-group">
                            <label for="status" class="form-label">Status</label>
                            <div class="admin-form-input">
                                <select name="status" id="status"
                                    class="form-control @error('status') is-invalid @enderror">
                                    @php
                                        $statuses = [
                                            'awaiting_payment' => 'Awaiting Payment',
                                            'awaiting_verification' => 'Awaiting Verification',
                                            'verified' => 'Verified',
                                            'ready_for_pickup' => 'Ready for Pickup',
                                            'finished' => 'Finished',
                                        ];
                                    @endphp
                                    @foreach ($statuses as $item => $label)
                                        <option value="{{ $item }}"
                                            {{ old('status', $order->status) == $item ? 'selected' : '' }}>
                                            {{ $label }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('status')
                                    <div class="invalid-feedback d-block">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="admin-form-group">
                            @if ($order->payment_proof)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/orders/' . $order->payment_proof) }}" alt="Payment Proof"
                                        width="150" height="150"
                                        style="object-fit: cover; border-radius: 8px; margin-right: 30px;">
                                </div>
                            @else
                                <em class="text-muted">No Payment Proof Uploaded</em>
                            @endif
                        </div>
                    </div>
                    <div class="admin-actions px-4 pt-2 pb-3">
                        <button type="submit" class="btn btn-primary">
                            <span class="fa fa-save"></span>
                            Update
                        </button>
                        <a href="{{ route('admin.order.index') }}" class="btn btn-secondary">
                            <span class="fa fa-times-circle"></span>
                            Cancel
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr>

@endsection
