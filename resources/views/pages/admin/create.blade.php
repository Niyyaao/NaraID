@extends('layouts.admin.app')

@section('title', 'Admin Creation Page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 admin-page-title">Create New Admin</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="admin-card">
                <form action="{{ route('admin.admin.store') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror">

                            @error('name')
                                <div class="invalid-feedback d-block">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" name="email" id="email" value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror">

                            @error('email')
                                <div class="invalid-feedback d-block">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" id="password"
                                class="form-control @error('password') is-invalid @enderror">

                            @error('password')
                                <div class="invalid-feedback d-block">
                                    <span>{{ $message }}</span>
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control">
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">
                            <span class="fa fa-save"></span>
                            Save
                        </button>
                        <a href="{{ route('admin.admin.index') }}" class="btn btn-secondary">
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
