@extends('layouts.admin.app')

@section('title', 'Admin Creation Page')

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 admin-page-title">Create New Admin</h1>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="admin-form-card">
                <form action="{{ route('admin.admin.store') }}" method="POST">
                    @csrf

                    <div class="card-body">
                        <div class="admin-form-group">
                            <label for="name" class="form-label">Name</label>
                            <div class="admin-form-input">
                                <input type="text" name="name" id="name" value="{{ old('name') }}"
                                    class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                    <div class="invalid-feedback d-block">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="admin-form-group">
                            <label for="email" class="form-label">Email</label>
                            <div class="admin-form-input">
                                <input type="email" name="email" id="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror">

                                @error('email')
                                    <div class="invalid-feedback d-block">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="admin-form-group">
                            <label for="password" class="form-label">Password</label>
                            <div class="admin-form-input">
                                <input type="password" name="password" id="password"
                                    class="form-control @error('password') is-invalid @enderror">

                                @error('password')
                                    <div class="invalid-feedback d-block">
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="admin-form-group">
                            <label for="password_confirmation" class="form-label">Password Confirmation</label>
                            <div class="admin-form-input">
                                <input type="password" name="password_confirmation" id="password_confirmation"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="admin-actions px-4 pt-2 pb-3">
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
