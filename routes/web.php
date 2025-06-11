<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\bookingController;

Route::get('/', function () {
    return view('mainpage');
});

// Payment Routes

Route::get('/payment', [BookingController::class, 'index'])->name('payment.index');
//Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payment/success/{id}', [PaymentController::class, 'success'])->name('payment.success');

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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/guest', [GuestController::class, 'index'])->name('guest');


