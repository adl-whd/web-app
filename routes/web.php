<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\Controller;

Route::get('/', function () {
    return view('welcome');
=======

Route::get('/', function () {
    return view('mainpage');
>>>>>>> cf7e21540a275c64757188c9e03ff58bf93f87ea
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
<<<<<<< HEAD
Route::resource('payment', Controller::class);
=======
>>>>>>> cf7e21540a275c64757188c9e03ff58bf93f87ea
