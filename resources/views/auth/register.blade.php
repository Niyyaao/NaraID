@extends('layouts.auth')

@section('title', 'Register Page NaraID')

@section('content')
    <div class="regin-page">
        <div class="container min-vh-100 d-flex align-items-center">

            <!-- Outer Row -->
            <div class="row justify-content-center w-100">

                <div class="col-lg-6 col-md-9">
                    <a href="{{ url('/') }}" class="back-btn" title="Back to Landing Page"
                        aria-label="Back to Landing Page">
                        <i class="fa fa-arrow-left"></i>
                    </a>
                    <div class="card regin-card o-hidden border-0 shadow-lg">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome !</h1>
                                        </div>
                                        <form class="user" method="POST" action="{{ route('register') }}">
                                            @csrf

                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text"
                                                    class="form-control form-control-user @error('name') is-invalid @enderror"
                                                    id="name" name="name" value="{{ old('name') }}"
                                                    placeholder="Enter Your Name Here" required autofocus>
                                                @error('name')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email"
                                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                                    id="email" name="email" value="{{ old('email') }}"
                                                    placeholder="Enter Email Address Here" required>
                                                @error('email')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="phone">Phone Number</label>
                                                <input type="tel"
                                                    class="form-control form-control-user @error('phone') is-invalid @enderror"
                                                    id="phone" name="phone" value="{{ old('phone') }}"
                                                    placeholder="Enter Phone Number Here" required>
                                                @error('phone')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password"
                                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                                    id="password" name="password" placeholder="Enter Password Here"
                                                    required autocomplete="new-password">
                                                @error('password')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="password-confirm">Confirm Password</label>
                                                <input type="password" class="form-control form-control-user"
                                                    id="password-confirm" name="password_confirmation"
                                                    placeholder="Repeat Password Here" required autocomplete="new-password">
                                            </div>

                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                <span class="fa fa-user-plus"></span> Register
                                            </button>
                                        </form>

                                        <div class="text-center mt-3">
                                            <a class="small" href="{{ route('login') }}">Already have an account? Login</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
