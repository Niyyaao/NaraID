@extends('layouts.admin.app')

@section('title', 'Profile page')

@section('content')
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">My Profile</h1>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-body">
                <form action="{{ route('admin.profile.save') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name"
                            class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}">

                        @error('name')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email"
                            class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}">

                        @error('email')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" id="password" name="password"
                            class="form-control @error('password') is-invalid @enderror">

                        @error('password')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Password Confirmation</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror">

                        @error('password_confirmation')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="admin-button-actions justify-content-center gap-5 d-flex align-items-center">
                        <button type="submit" class="btn btn-primary">
                            <span class="fa fa-save"></span>
                            Save
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                            <span class="fa fa-times-circle"></span>
                            Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <hr>
@endsection
