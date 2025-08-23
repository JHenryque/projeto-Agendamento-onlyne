<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {

});

Route::middleware('auth')->group(function () {

    Route::redirect('/', '/home');
    Route::get('/home', [UserController::class, 'index'])->name('home');

    // perfil do usuario
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::post('/profile/edit', [ProfileController::class, 'updateProfile'])->name('user.profile.update');
});
