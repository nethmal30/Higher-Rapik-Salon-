<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Public Pages
Route::get('/', function () {
    return view('home');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/booking', [AppointmentController::class, 'index'])->name('appointment.index');

// Authentication (login & register only on booking page)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    // Password reset (guest)
    Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
    Route::post('/forgot-password', [AuthController::class, 'sendResetLink'])->name('password.email');
});

Route::get('/admin/login', [AuthController::class, 'showAdminLogin'])->name('admin.login');
Route::redirect('/Admin', '/admin');
Route::redirect('/Admin/', '/admin');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::post('/book-appointment', [AppointmentController::class, 'store'])->name('appointment.store');
});

// Admin Dashboard Routes (protected)
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', function () { return redirect()->route('admin.dashboard'); });
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::post('/appointment/{id}/update', [AdminController::class, 'updateStatus'])->name('admin.updateStatus');
    Route::post('/appointment/{id}/delete', [AdminController::class, 'deleteAppointment'])->name('admin.deleteAppointment');
    Route::post('/staff/add', [AdminController::class, 'addStaff'])->name('admin.addStaff');
    Route::post('/appointments/clear', [AdminController::class, 'clearCustomers'])->name('admin.clearCustomers');
});
