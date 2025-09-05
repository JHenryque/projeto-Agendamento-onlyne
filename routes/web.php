<?php

use App\Http\Controllers\ColaboratorsController;
use App\Http\Controllers\ConfirmAccountController;
use App\Http\Controllers\EmpreendedorController;
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

    // global para todos usuarios
    Route::get('/users/detail/{id}', [UserController::class, 'userDetails'])->name('user.detail');

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
    Route::get('/colaboration/edit/colaborator/{id}', [ColaboratorsController::class, 'editColaborator'])->name('colaboration.edit.colaborator');
    Route::post('/colaboration/update/colaborator', [ColaboratorsController::class, 'updateColaborator'])->name('colaboration.update.colaborator');
    Route::get('/colaboration/deleted/{id}', [ColaboratorsController::class, 'deleteColaborator'])->name('colaboration.delete.colaborator');
    Route::get('/colaboration/destroy/{id}', [ColaboratorsController::class, 'destroyColaborator'])->name('colaboration.destroy.colaborator');
    Route::get('/colaboration/restore/{id}', [ColaboratorsController::class, 'restoreColaborator'])->name('colaboration.restore.colaborator');

    // usuario colaborador
    Route::get('/colaboration/home', [ColaboratorsController::class, 'homeColaborators'])->name('colaboration.home');

    // Empreendedor
    Route::get('/empreendedor', [EmpreendedorController::class, 'index'])->name('empreendedor');
    Route::get('/empreendedor/create', [EmpreendedorController::class, 'createEmpreendedores'])->name('empreendedor.create.empreendedores');
    Route::post('/empreendedor/submit', [EmpreendedorController::class, 'submitEmpreendedor'])->name('empreendedor.submit.empreendedores');
    Route::get('/empreendedor/edit/{id}', [EmpreendedorController::class, 'editEmpreendedor'])->name('empreendedor.edit.empreendedores');
    Route::post('/empreendedor/update', [EmpreendedorController::class, 'updateEmpreendedor'])->name('empreendedor.update.empreendedores');
    Route::get('/empreendedor/deleted/{id}', [EmpreendedorController::class, 'deleteEmpreendedor'])->name('empreendedor.delete.empreendedores');
    Route::get('/empreendedor/destroy/{id}', [EmpreendedorController::class, 'destroyEmpreendedor'])->name('empreendedor.destroy.empreendedores');
    Route::get('/empreendedor/details/{id}', [EmpreendedorController::class, 'detailsEmpreendedor'])->name('empreendedor.details.empreendedores');
    Route::get('/empreendedor/restore/{id}', [EmpreendedorController::class, 'restoreEmpreendedor'])->name('empreendedor.restore.empreendedores');
});
