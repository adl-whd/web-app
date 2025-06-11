<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\bookingController;

Route::get('/', function () {
    return view('mainpage');
});

// Payment Routes
Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/process-payment', [PaymentController::class, 'store'])->name('payment.process');
Route::get('/payment/{payment}', [PaymentController::class, 'show'])->name('payment.show');

//booking route
Route::get('/book', [bookingController::class, 'index'])->name('booking.index');
Route::post('/book', [bookingController::class, 'store'])->name('booking.process');
Route::get('/payment/{payment}', [bookingController::class, 'show'])->name('booking.show');

// Authenticated Routes (Jetstream)
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
