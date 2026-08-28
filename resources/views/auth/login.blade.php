@extends('layouts.auth')

@section('title', 'Login Page NaraID')

@section('content')
    <div class="regin-page">
        <div class="container min-vh-100 d-flex align-items-center">

            <!-- Outer Row -->
            <div class="row justify-content-center w-100">

                <div class="col-lg-6 col-md-9">

                    <div class="card regin-card o-hidden border-0 shadow-lg">
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="p-5">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-4">Welcome !</h1>
                                        </div>
                                        <form class="user" method="POST" action="{{ route('login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email"
                                                    class="form-control form-control-user @error('email') is-invalid @enderror"
                                                    id="email" name="email" value="{{ old('email') }}"
                                                    placeholder="Enter Email Address Here">
                                                @error('email')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password"
                                                    class="form-control form-control-user @error('password') is-invalid @enderror"
                                                    id="password" name="password" placeholder="Enter Password here">
                                                @error('password')
                                                    <div class="invalid-feedback d-block">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox small">
                                                    <input type="checkbox" name="remember" id="remember"
                                                        class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="remember">Remember
                                                        Me</label>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                <span class="fa fa-sign-in-alt"></span> Login
                                            </button>
                                        </form>
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
