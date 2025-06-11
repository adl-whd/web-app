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



// routes/web.php
Route::get('/facilities', function () {
    return view('facilities.index');
});


Route::get('/facilities', function () {
    $facilities = \App\Models\Facility::all();
    return view('facilities.index', compact('facilities'));
});

// Routes for Facility Management
Route::resource('facilities', FacilityController::class);
Route::get('/facilities', [FacilityController::class, 'index'])->name('facilities.index');
Route::get('/facilities/create', [FacilityController::class, 'create'])->name('facilities.create');
Route::post('/facilities', [FacilityController::class, 'store'])->name('facilities.store');
Route::get('/facilities/{id}/edit', [FacilityController::class, 'edit'])->name('facilities.edit');
Route::put('/facilities/{id}', [FacilityController::class, 'update'])->name('facilities.update');
Route::delete('/facilities/{id}', [FacilityController::class, 'destroy'])->name('facilities.destroy');



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

