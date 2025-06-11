<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;

// Public Routes
Route::get('/', function () {
    return view('facility');
});

// Payment Routes
Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/process-payment', [PaymentController::class, 'store'])->name('payment.process');
Route::get('/payment/{payment}', [PaymentController::class, 'show'])->name('payment.show');

// Facility Routes
Route::get('/facility', [FacilityController::class, 'index'])->name('facility');

// Guest Routes
Route::get('/guest', [GuestController::class, 'index'])->name('guest');

// Authenticated Routes (Jetstream)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Use either the closure OR the controller, not both
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
