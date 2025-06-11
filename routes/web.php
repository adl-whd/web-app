<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\RoomController;

Route::get('/', function () {
    return view('dashboard');
});

// Payment Routes
Route::get('/payment', [PaymentController::class, 'index'])->name('payment.index');
Route::post('/process-payment', [PaymentController::class, 'store'])->name('payment.process');
Route::get('/payment/{payment}', [PaymentController::class, 'show'])->name('payment.show');

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



Route::get('room', [RoomController::class, 'index']);
Route::resource('room', RoomController::class);

// Route::get('students' , [StudentsController::class, 'index']);
// Route::resource('addstudent' ,StudentsController::class);
Route::get('/room', [RoomController::class, 'index'])->name('room');
Route::get('/room/{id}', [RoomController::class, 'show'])->name('room');
