@extends('layouts.admin.app')

@section('title', 'Album Creation Page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 admin-page-title">CREATE NEW DATA ALBUM</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="admin-form-card">
                <form action="{{ route('admin.album.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="admin-form-group">
                            <label for="title" class="form-label">Title</label>
                            <div class="admin-form-input">
                                <input type="text" name="title" id="title" value="{{ old('title') }}"
                                    class="form-control @error('title') is-invalid @enderror">

                                @error('title')
                                    <div class="invalid-feedback d-block">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="admin-form-group">
                            <label for="artist_name" class="form-label">Artist Name</label>
                            <div class="admin-form-input">
                                <input type="text" name="artist_name" id="artist_name" value="{{ old('artist_name') }}"
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
                                <input type="number" name="stock" id="stock" value="{{ old('stock') }}"
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
                                <input type="number" name="price" id="price" value="{{ old('price') }}"
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
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

                                @error('description')
                                    <div class="invalid-feedback d-block">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="admin-form-group">
                            <label for="image" class="form-label">Album Image</label>
                            <div class="admin-form-input">
                                <input type="file" name="image" id="image" accept="image/*"
                                    class="form-control @error('image') is-invalid @enderror">

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
                            Save
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
