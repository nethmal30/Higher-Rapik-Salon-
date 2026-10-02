@extends('layouts.auth')

@section('title', 'User Login')

@section('content')
<div class="auth-card card-glass p-4 p-md-5">
    <div class="text-center mb-4">
        <span class="auth-subtitle">Welcome Back</span>
        <h2 class="auth-title">Member <span>Login</span></h2>
        <p class="auth-description">Sign in to your account to book appointments and manage your profile.</p>
    </div>

    @if ($errors->any())
        <div class="alert auth-alert-error mb-4">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="hidden" name="portal" value="user">

        <div class="mb-4">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email"
                   class="form-control form-input-premium @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="you@example.com" required autofocus>
        </div>

        <div class="mb-4">
            <label for="password">Password</label>
            <input type="password" name="password" id="password"
                   class="form-control form-input-premium @error('password') is-invalid @enderror"
                   placeholder="Enter your password" required>
        </div>

        <div class="mb-4 d-flex justify-content-between align-items-center">
            <div class="form-check">
                <input type="checkbox" name="remember" id="remember" class="form-check-input auth-checkbox"
                       {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label auth-check-label" for="remember">Remember me</label>
            </div>
        </div>

        <button type="submit" class="btn btn-gold-premium w-100 mb-3">
            <i class="fas fa-sign-in-alt me-2"></i> Sign In
        </button>
    </form>

    <div class="text-center mb-3">
        <a href="{{ route('password.request') }}">Forgot your password?</a>
    </div>

    <div class="text-center auth-footer-links">
        <p class="mb-2">Don't have an account? <a href="{{ route('register') }}">Create one</a></p>
        <p class="mb-0"><a href="{{ route('admin.login') }}"><i class="fas fa-shield-alt me-1"></i> Admin Login</a></p>
    </div>
</div>
@endsection
