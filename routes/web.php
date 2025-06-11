<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

Route::get('/', function () {
    return view('welcome');
});

// Payment Routes
Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/payment', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payment/success/{id}', [PaymentController::class, 'success'])->name('payment.success');

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
