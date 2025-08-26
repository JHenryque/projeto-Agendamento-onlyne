<?php

use App\Http\Controllers\ConfirmAccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('confirm-account/{id)', [ConfirmAccountController::class, 'confirmAccount'])->name('confirm-account');
});

Route::middleware('auth')->group(function () {

    Route::redirect('/', '/home');
    Route::get('/home', [UserController::class, 'index'])->name('home');

    // perfil do usuario
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('user.profile.update');
    Route::get('/profile/password', [ProfileController::class, 'editePassword'])->name('user.profile.password');
    Route::post('/profile/password-update', [ProfileController::class, 'updatePassword'])->name('user.profile.password.update');

    // alterar senha
    Route::get('/profile/altera-password/{token}', [ConfirmAccountController::class, 'alteraPassword'])->name('altera.password');
    Route::post('/profile/altera-password', [ConfirmAccountController::class, 'alterarPasswordUpdate'])->name('altera.password.update');
});
