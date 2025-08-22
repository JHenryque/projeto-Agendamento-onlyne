<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {

});

Route::middleware('auth')->group(function () {

    Route::redirect('/', '/home');
    Route::get('/home', [UserController::class, 'index'])->name('home');
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
});
