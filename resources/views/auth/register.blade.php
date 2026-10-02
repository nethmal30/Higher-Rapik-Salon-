@extends('layouts.auth')

@section('title', 'Register')

@section('content')
<div class="auth-card card-glass p-4 p-md-5">
    <div class="text-center mb-4">
        <span class="auth-subtitle">Join Us</span>
        <h2 class="auth-title">Create <span>Account</span></h2>
        <p class="auth-description">Register to book appointments and enjoy our premium salon services.</p>
    </div>

    @if ($errors->any())
        <div class="alert auth-alert-error mb-4">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="name">Full Name</label>
            <input type="text" name="name" id="name"
                   class="form-control form-input-premium @error('name') is-invalid @enderror"
                   value="{{ old('name') }}" placeholder="Your full name" required autofocus>
        </div>

        <div class="mb-4">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email"
                   class="form-control form-input-premium @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="you@example.com" required>
        </div>

        <div class="mb-4">
            <label for="password">Password</label>
            <input type="password" name="password" id="password"
                   class="form-control form-input-premium @error('password') is-invalid @enderror"
                   placeholder="Create a password" required>
        </div>

        <div class="mb-4">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation"
                   class="form-control form-input-premium"
                   placeholder="Confirm your password" required>
        </div>

        <button type="submit" class="btn btn-gold-premium w-100 mb-3">
            <i class="fas fa-user-plus me-2"></i> Create Account
        </button>
    </form>

    <div class="text-center auth-footer-links">
        <p class="mb-0">Already have an account? <a href="{{ route('login') }}">Sign in</a></p>
    </div>
</div>
@endsection
