<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GuestController;
<<<<<<< HEAD
use App\Http\Controllers\bookingController;
use App\Http\Controllers\RoomController;
=======
>>>>>>> b7e085c20caf6ade893efd3cbe2ceeede8154d08

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


Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/guest', [GuestController::class, 'index'])->name('guest');
Route::get('/room', [RoomController::class, 'index'])->name('room');



Route::get('room', [RoomController::class, 'index']);
Route::resource('room', RoomController::class);

// Route::get('students' , [StudentsController::class, 'index']);
// Route::resource('addstudent' ,StudentsController::class);
Route::get('/room', [RoomController::class, 'index'])->name('room');
// Route::get('/room/{id}', [RoomController::class, 'show'])->name('room');

Route::get('/room', [RoomController::class, 'index'])->name('room');
Route::get('/room/create', [RoomController::class, 'create'])->name('room.create');
Route::post('/room', [RoomController::class, 'store'])->name('room.store');
Route::get('/room/{room}', [RoomController::class, 'show'])->name('room.show');
Route::get('/room/{room}/edit', [RoomController::class, 'edit'])->name('room.edit');
Route::put('/room/{room}', [RoomController::class, 'update'])->name('room.update');
Route::delete('/room/{room}', [RoomController::class, 'destroy'])->name('room.destroy');
