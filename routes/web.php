<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FacilityController;

Route::get('/', function () {
    return view('welcome');
});

// Payment Routes
Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/process-payment', [PaymentController::class, 'store'])->name('payment.process');
Route::get('/payment/{payment}', [PaymentController::class, 'show'])->name('payment.show');

// Facility Routes
Route::get('facility', [FacilityController::class, 'index'])->name('facility.index');

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
