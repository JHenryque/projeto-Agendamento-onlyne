<?php

use App\Http\Controllers\ColaboratorsController;
use App\Http\Controllers\ConfirmAccountController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('confirm-account/{id})', [ConfirmAccountController::class, 'confirmConta'])->name('confirm-account');
    Route::post('confirm-account', [ConfirmAccountController::class, 'confirmAccountSubmit'])->name('confirm-account.submit');
});

Route::middleware('auth')->group(function () {

    Route::redirect('/', '/home');
    Route::get('/home', function () {

        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.home');
        } else if (auth()->user()->role === 'colaborator') {
            return redirect()->route('colaboration.home');
        }
    })->name('home');

    Route::get('/admin/home', [UserController::class, 'index'])->name('admin.home');

    // perfil do usuario
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('user.profile.update');
    Route::get('/profile/password', [ProfileController::class, 'editePassword'])->name('user.profile.password');
    Route::post('/profile/password-update', [ProfileController::class, 'updatePassword'])->name('user.profile.password.update');

    // alterar senha do usuario
    Route::get('/profile/altera-password/{token}', [ConfirmAccountController::class, 'alteraPassword'])->name('altera.password');
    Route::post('/profile/altera-password', [ConfirmAccountController::class, 'alteraPasswordUpdate'])->name('altera.password.update');

    // colaborators
    Route::get('/colaboration', [ColaboratorsController::class, 'index'])->name('colaboration');
    Route::get('/colaboration/create', [ColaboratorsController::class, 'createColaborator'])->name('colaboration.create.colaborator');
    Route::post('/colaboration/colaborator-submit', [ColaboratorsController::class, 'colaboratorSubmit'])->name('colaboration.colaborator.submit');

    // usuario colaborador
    Route::get('/colaboration/home', [ColaboratorsController::class, 'homeColaborators'])->name('colaboration.home');
});
