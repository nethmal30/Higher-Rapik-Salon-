@extends('layouts.auth')

@section('title', 'Admin Login')

@section('content')
<div class="auth-card card-glass p-4 p-md-5">
    <div class="text-center mb-4">
        <span class="auth-subtitle">Restricted Access</span>
        <h2 class="auth-title">Admin <span>Portal</span></h2>
        <p class="auth-description">Authorized personnel only. Sign in to manage appointments and staff.</p>
    </div>

    @if (session('error'))
        <div class="alert auth-alert-error mb-4">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ session('error') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert auth-alert-error mb-4">
            <i class="fas fa-exclamation-circle me-2"></i>
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf
        <input type="hidden" name="portal" value="admin">

        <div class="mb-4">
            <label for="email">Admin Email</label>
            <input type="email" name="email" id="email"
                   class="form-control form-input-premium @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="admin@higherrapik.com" required autofocus>
        </div>

        <div class="mb-4">
            <label for="password">Password</label>
            <input type="password" name="password" id="password"
                   class="form-control form-input-premium @error('password') is-invalid @enderror"
                   placeholder="Enter admin password" required>
        </div>

        <div class="mb-4">
            <div class="form-check">
                <input type="checkbox" name="remember" id="remember" class="form-check-input auth-checkbox"
                       {{ old('remember') ? 'checked' : '' }}>
                <label class="form-check-label auth-check-label" for="remember">Remember me</label>
            </div>
        </div>

        <button type="submit" class="btn btn-gold-premium w-100 mb-3">
            <i class="fas fa-lock me-2"></i> Admin Sign In
        </button>
    </form>

    <div class="text-center auth-footer-links">
        <p class="mb-0"><a href="{{ route('appointment.index') }}"><i class="fas fa-arrow-left me-1"></i> Back to Booking</a></p>
    </div>
</div>
@endsection
