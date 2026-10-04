@extends('layouts.buyer.app')

@section('title', 'Order Page')

@section('content')
    <div class="page-head">
        <div>
            <h1>Make New Order</h1>
            <p>Choose your album and quantity to place a pre-order.</p>
        </div>
        <a href="{{ route('buyer.order.index') }}" class="btn-back">
            <i class="fas fa-arrow-left mr-2"></i><span>My Orders</span>
        </a>
    </div>
    <div class="row justify-content-center">
        <div class="order-wrapper">
            <div class="card shadow mb-4">
                <div class="card-body buyer-order-content">
                    <form action="{{ route('buyer.order.store') }}" method="POST">
                        @csrf

                        {{-- BUYER INFORMATION --}}
                        <h6 class="text-uppercase text-muted small font-weight-bold mb-3">Buyer Information</h6>
                        <div class="row mb-2">
                            <div class="col-md-4 mb-3">
                                <label for="buyer_name" class="small text-muted mb-1">Name</label>
                                <input type="text" id="buyer_name" class="form-control bg-light"
                                    value="{{ auth()->user()->name }}" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="buyer_email" class="small text-muted mb-1">Email</label>
                                <input type="email" id="buyer_email" class="form-control bg-light"
                                    value="{{ auth()->user()->email }}" readonly>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label for="buyer_phone" class="small text-muted mb-1">Phone Number</label>
                                <input type="text" id="buyer_phone" class="form-control bg-light"
                                    value="{{ auth()->user()->phone }}" readonly>
                            </div>
                        </div>

                        <hr class="mb-4">

                        {{-- ALBUM --}}
                        <h6 class="text-uppercase text-muted small font-weight-bold mb-3">Album</h6>

                        @if (isset($fromalbum))
                            <input type="hidden" name="album_id" value="{{ $fromalbum->id }}">
                        @else
                            <div class="mb-3">
                                <select name="album_id" id="album"
                                    class="form-control @error('album_id') is-invalid @enderror" required>
                                    <option value="" data-price="0" data-title="" data-image="">-- Choose Album --
                                    </option>
                                    @foreach ($albums as $album)
                                        <option value="{{ $album->id }}" data-price="{{ $album->price }}"
                                            data-title="{{ $album->title }}"
                                            data-image="{{ $album->image ? asset('storage/albums/' . $album->image) : '' }}"
                                            {{ old('album_id') == $album->id ? 'selected' : '' }}>
                                            {{ $album->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('album_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif

                        {{-- RINGKASAN: FOTO + NAMA + HARGA + QTY + TOTAL --}}
                        <div class="order-item mb-4">
                            <div class="order-item-image" id="albumImageWrap">
                                @if (isset($fromalbum) && $fromalbum->image)
                                    <img id="albumImage" src="{{ asset('storage/albums/' . $fromalbum->image) }}"
                                        alt="{{ $fromalbum->title }}">
                                @else
                                    <img id="albumImage" src="" alt="" style="display: none;">
                                    <i class="fas fa-compact-disc" id="albumPlaceholder"></i>
                                @endif
                            </div>

                            <div class="order-item-body">
                                <div class="order-item-title" id="albumTitle">
                                    {{ isset($fromalbum) ? $fromalbum->title : 'No album selected' }}
                                </div>
                                <div class="order-item-price" id="albumPrice">
                                    @if (isset($fromalbum))
                                        IDR {{ number_format($fromalbum->price, 0, ',', '.') }}
                                    @else
                                        IDR 0
                                    @endif
                                </div>

                                <div class="order-item-qty">
                                    <label for="qty" class="small text-muted mb-1">Qty</label>
                                    <input type="number" name="qty" id="qty"
                                        class="form-control @error('qty') is-invalid @enderror" min="1"
                                        value="{{ old('qty', 1) }}" required>
                                    @error('qty')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="order-item-total">
                                    <span class="text-muted">Total</span>
                                    <span class="amount" id="total">IDR 0</span>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center buyer-actions">
                            <button type="submit" class="btn btn-primary px-3 mr-2"><span class="fas fa-shopping-bag"></span>
                                Order Now</button>

                            <a href="{{ route('buyer.order.index') }}" class="btn btn-secondary px-4">
                                <span class="fa fa-times-circle"></span>
                                Cancel
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const fmt = (n) => 'IDR ' + n.toLocaleString('id-ID');

            const qtyInput = document.getElementById('qty');
            const totalEl = document.getElementById('total');
            const select = document.getElementById('album');

            function updateOrder() {
                let price = 0;

                @if (isset($fromalbum))
                    price = {{ (int) $fromalbum->price }};
                @else
                    if (select) {
                        const opt = select.options[select.selectedIndex];
                        price = parseInt(opt.dataset.price || 0);

                        const titleEl = document.getElementById('albumTitle');
                        const priceEl = document.getElementById('albumPrice');
                        const img = document.getElementById('albumImage');
                        const placeholder = document.getElementById('albumPlaceholder');

                        if (titleEl) titleEl.innerText = opt.dataset.title || 'No album selected';
                        if (priceEl) priceEl.innerText = fmt(price);

                        if (img && placeholder) {
                            if (opt.dataset.image) {
                                img.src = opt.dataset.image;
                                img.style.display = 'block';
                                placeholder.style.display = 'none';
                            } else {
                                img.style.display = 'none';
                                placeholder.style.display = 'block';
                            }
                        }
                    }
                @endif

                const qty = parseInt(qtyInput.value) || 0;
                totalEl.innerText = fmt(price * qty);
            }

            qtyInput.addEventListener('input', updateOrder);
            if (select) select.addEventListener('change', updateOrder);

            updateOrder();
        });
    </script>
@endsection
