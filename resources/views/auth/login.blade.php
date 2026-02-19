@extends('layouts.auth')

@section('content')
<div class="col-lg-4 mx-auto">
    <div class="auth-form-light text-left py-5 px-4 px-sm-5">
        <div class="brand-logo">
            <h4 class="text-primary fw-bold">
                <i class="mdi mdi-layers me-2"></i> Purple
            </h4>
        </div>
        <h4>Hello! Let's get started</h4>
        <h6 class="fw-light">Sign in to continue.</h6>

        {{-- Error Message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p class="mb-0">{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form class="pt-3" method="POST" action="{{ route('login') }}">
            @csrf

            {{-- Email --}}
            <div class="form-group">
                <input
                    id="email"
                    type="email"
                    class="form-control form-control-lg @error('email') is-invalid @enderror"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Email Address"
                    required
                    autocomplete="email"
                    autofocus
                >
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-group">
                <input
                    id="password"
                    type="password"
                    class="form-control form-control-lg @error('password') is-invalid @enderror"
                    name="password"
                    placeholder="Password"
                    required
                    autocomplete="current-password"
                >
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Remember Me --}}
            <div class="my-2 d-flex justify-content-between align-items-center">
                <div class="form-check text-left">
                    <label class="form-check-label text-muted">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        Keep me signed in
                    </label>
                </div>
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="auth-link text-black">
                        Forgot password?
                    </a>
                @endif
            </div>

            {{-- Submit --}}
            <div class="mt-3 d-grid gap-2">
                <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                    SIGN IN
                </button>
            </div>

            {{-- Register Link --}}
            <div class="text-center mt-4 fw-light">
                Don't have an account?
                <a href="{{ route('register') }}" class="text-primary">Create</a>
            </div>

        </form>
    </div>
</div>
@endsection