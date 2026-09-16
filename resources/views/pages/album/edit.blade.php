@extends('layouts.admin.app')

@section('title', 'Album Edit Page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 admin-page-title">Edit Album Data</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="admin-form-card">
                <form action="{{ route('admin.album.update', encrypt($album->id)) }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="card-body">
                        <div class="admin-form-group">
                            <label for="id" class="form-label">ID</label>

                            <div class="admin-form-input">
                                <input type="text" id="id" value="{{ $album->id }}" class="form-control"
                                    style="border:none; background-color: transparent;" readonly>
                            </div>
                        </div>

                        <div class="admin-form-group">
                            <label for="title" class="form-label">Title</label>
                            <div class="admin-form-input">

                                <input type="text" name="title" id="title"
                                    value="{{ old('title', $album->title) }}"
                                    class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                    <div class="invalid-feedback d-block">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="admin-form-group">
                            <label for="release_date" class="form-label">Release Date</label>
                            <div class="admin-form-input">

                                <input type="date" name="release_date" id="release_date"
                                    value="{{ old('release_date', $album->release_date?->format('Y-m-d')) }}"
                                    class="form-control @error('release_date') is-invalid @enderror">

                                @error('release_date')
                                    <div class="invalid-feedback d-block">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="admin-form-group">
                            <label for="artist_name" class="form-label">Artist</label>
                            <div class="admin-form-input">

                                <input type="text" name="artist_name" id="artist_name"
                                    value="{{ old('artist_name', $album->artist_name) }}"
                                    class="form-control @error('artist_name') is-invalid @enderror">

                                @error('artist_name')
                                    <div class="invalid-feedback d-block">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="admin-form-group">
                            <label for="stock" class="form-label">Stock</label>
                            <div class="admin-form-input">

                                <input type="number" name="stock" id="stock"
                                    value="{{ old('stock', $album->stock) }}"
                                    class="form-control @error('stock') is-invalid @enderror">

                                @error('stock')
                                    <div class="invalid-feedback d-block">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="admin-form-group">
                            <label for="price" class="form-label">Price</label>
                            <div class="admin-form-input">

                                <input type="number" name="price" id="price"
                                    value="{{ old('price', $album->price) }}"
                                    class="form-control @error('price') is-invalid @enderror">

                                @error('price')
                                    <div class="invalid-feedback d-block">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="admin-form-group">
                            <label for="description" class="form-label">Description</label>
                            <div class="admin-form-input">

                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description', $album->description) }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback d-block">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="admin-form-group">
                            @if ($album->image)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/albums/' . $album->image) }}" alt="{{ $album->title }}"
                                        width="150" height="150"
                                        style="object-fit: cover; border-radius: 8px; margin-right: 30px;">
                                </div>
                            @endif

                            <div class="admin-form-input">
                                <input type="file" name="image" id="image" accept="image/*"
                                    class="form-control  @error('image') is-invalid @enderror">

                                @error('image')
                                    <div class="invalid-feedback d-block">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>

                    </div>
                    <div class="admin-actions px-4 pt-2 pb-3">
                        <button type="submit" class="btn btn-primary">
                            <span class="fa fa-save"></span>
                            Update
                        </button>
                        <a href="{{ route('admin.album.index') }}" class="btn btn-secondary">
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
