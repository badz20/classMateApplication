@extends('layouts.login')

@section('content')
<div class="container login-container ">
    @if (session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>
                <div class="m-4">
                <img src="{{ asset('images/classmatelogo.png') }}" alt="Logo" style="width: 100px; height: auto; display: block; margin:  auto;">

                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3 col-md-12 justify-content-center row">
                            <div class="col-md-6">
                            <label for="email" class="col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-md-12 justify-content-center row">
                            <div class="col-md-6">
                            <label for="password" class="col-form-label text-md-end">{{ __('Password') }}</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 col-md-12 justify-content-center row">
                            <div class="col-md-6">
                            <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>

                            </div>
                        </div>
                        <div class="mb-3 col-md-12 justify-content-center row">
                            <div class="col-md-6 text-end">
                            @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            <button  type="submit" class="btn btn-primary col-md-12">
                                    {{ __('Login') }}
                                </button>

                            </div>
                        </div>
                        <div class="mb-3 col-md-12 justify-content-center row">
                            <div class="col-md-6 text-center">
                                <p>Don't have an account? <a href="{{ route('register') }}">Register</a></p>
                            </div>
                        </div>
                    </form>
                    <div class="mb-3 col-md-12 justify-content-center row">
                        <div class="col-md-6 text-center">
                            <p>----Or login with----</p>
                            <a href="{{ route('google.redirect') }}">
                                <img src="{{ asset('images/googlelogo.png') }}" alt="Google Login" style="width: 45px; height: auto; display: block; margin:  auto;">
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
