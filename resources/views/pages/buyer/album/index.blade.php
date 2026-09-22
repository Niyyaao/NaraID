@extends('layouts.buyer.app')

@section('title', 'Album Page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Album</h1>
    </div>

    <div class="row">
        @forelse ($albums as $album)
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card shadow h-100">
                    <div class="card-body text-center">
                        <img src="{{ asset('storage/albums/' . $album->image) }}"
                            onerror="this.src='{{ asset('images/default-cover.png') }}" alt="{{ $album->title }}"
                            class="rounded mb-3" width="150" height="150" style="object-fit: cover">

                        <h6 class="font-weight-bold text-gray-800 mb-1">
                            {{ $album->title }}
                        </h6>

                        <div class="small text-muted mb-2">
                            {{ $album->artist_name }}
                        </div>

                        <div class="font-weight-bold text-gray-800 mb-3">
                            IDR {{ number_format($album->price, 0, ',', '.') }}
                        </div>

                        <div class="d-flex justify-content-center">
                            <a href="" class="btn btn-dark btn-sm mr-2">
                                Order
                            </a>

                            <a href="" class="btn btn-dark btn-sm mr-2">
                                Detail
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
        <div class="col-12">
            <div class="card shadow">
                <div class="card-body text-center text-muted">
                    No Album Available.
                </div>
            </div>
        </div>
        @endforelse
    </div>
@endsection
