@extends('layouts.auth')

@section('title', 'Forgot Password')

@section('content')
<div class="auth-card card-glass p-4 p-md-5">
    <div class="text-center mb-4">
        <span class="auth-subtitle">Reset Password</span>
        <h2 class="auth-title">Forgot <span>Password</span></h2>
        <p class="auth-description">Enter your email and we'll send a password reset link.</p>
    </div>

    @if (session('status'))
        <div class="alert alert-success mb-4">
            {{ session('status') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert auth-alert-error mb-4">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('password.email') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="email">Email Address</label>
            <input type="email" name="email" id="email"
                   class="form-control form-input-premium @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="you@example.com" required autofocus>
        </div>

        <button type="submit" class="btn btn-gold-premium w-100 mb-3">
            Send Reset Link
        </button>
    </form>

    <div class="text-center auth-footer-links">
        <p class="mb-0"><a href="{{ route('login') }}">Back to Login</a></p>
    </div>
</div>
@endsection
