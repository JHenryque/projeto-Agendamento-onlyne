<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ColaboratorsController;
use App\Http\Controllers\ConfirmAccountController;
use App\Http\Controllers\EmpreendedorController;
use App\Http\Controllers\HorarioController;
use App\Http\Controllers\PlansController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function () {
    Route::get('confirm-account/{id})', [ConfirmAccountController::class, 'confirmConta'])->name('confirm-account');
    Route::post('confirm-account', [ConfirmAccountController::class, 'confirmAccountSubmit'])->name('confirm-account.submit');
});

Route::middleware('auth')->group(function () {

    Route::redirect('/', '/home');
    Route::get('/home', function () {

        if (auth()->user()->role === 'admin') {
            // pagina home admin
            return redirect()->route('admin.home');
        } else if (auth()->user()->role === 'colaborator') {
            // pagina home colaborador
            return redirect()->route('colaboration.home');
        } else if (auth()->user()->role === 'empreendedor') {
            // pagina home emprendedor
            return redirect()->route('empreendedor.home');
        }
    })->name('home');

    Route::get('/admin/home', [UserController::class, 'index'])->name('admin.home');

    // perfil do usuario
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
    Route::post('/profile/update', [ProfileController::class, 'updateProfile'])->name('user.profile.update');

    // Envia um codigo de ativacao para email
    Route::get('/profile/codigo-active', [ProfileController::class, 'codigoActive'])->name('user.profile.codigo-active');
    Route::post('/profile/codigo-active', [ConfirmAccountController::class, 'updateCodigoActive'])->name('update.codigo.active');  // confirmAccountController
    Route::get('/profile/altera-password', [ProfileController::class, 'alteraPassword'])->name('user.profile.altera.password');
    Route::post('/profile/password-update-confirm', [ProfileController::class, 'updatePasswordConfirm'])->name('user.profile.password.update.confirm');

    // Envia um link pelo email para alterar senha
    Route::get('/profile/password', [ProfileController::class, 'editePassword'])->name('user.profile.password');
    Route::post('/profile/password-update', [ProfileController::class, 'updatePassword'])->name('user.profile.password.update');
    // ----------- confirmAccountController
    Route::get('/profile/altera-password/{token}', [ConfirmAccountController::class, 'alteraPassword'])->name('altera.password');
    Route::post('/profile/altera-password', [ConfirmAccountController::class, 'alteraPasswordUpdate'])->name('altera.password.update');

   // ---------------------------------------------------fim Profile -------------------------------------------------------------------------

    // colaborators
    Route::get('/colaboration', [ColaboratorsController::class, 'index'])->name('colaboration');
    Route::get('/colaboration/create', [ColaboratorsController::class, 'createColaborator'])->name('colaboration.create.colaborator');
    Route::post('/colaboration/colaborator-submit', [ColaboratorsController::class, 'colaboratorSubmit'])->name('colaboration.colaborator.submit');
    Route::get('/colaboration/edit/colaborator/{id}', [ColaboratorsController::class, 'editColaborator'])->name('colaboration.edit.colaborator');
    Route::post('/colaboration/update/colaborator', [ColaboratorsController::class, 'updateColaborator'])->name('colaboration.update.colaborator');
    Route::get('/colaboration/deleted/{id}', [ColaboratorsController::class, 'deleteColaborator'])->name('colaboration.delete.colaborator');
    Route::get('/colaboration/destroy/{id}', [ColaboratorsController::class, 'destroyColaborator'])->name('colaboration.destroy.colaborator');
    Route::get('/colaboration/restore/{id}', [ColaboratorsController::class, 'restoreColaborator'])->name('colaboration.restore.colaborator');
    Route::get('/users/detail/{id}', [UserController::class, 'userDetails'])->name('user.detail');// -- colaborator

    // home colaborador
    Route::get('/colaboration/home', [ColaboratorsController::class, 'homeColaborators'])->name('colaboration.home');

    // ----------------------------------------------------fim Colaboration-------------------------------------------------------------------------

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


    // -----------------------------------------------------Fim Empeendedor------------------------------------------------------------------------

    // home Empreendedor
    Route::get('/clients/home', [ClientController::class, 'homeEmpreendedor'])->name('empreendedor.home');
    // tipo atendimento
    Route::get('/clients/create/atendimento', [ClientController::class, 'createAtendimento'])->name('empreendedor.create.atendimento');
    Route::post('/client/submit/atendimento', [ClientController::class, 'submitAtendimento'])->name('empreendedor.submit.atendimento');
    Route::get('/client/edit/atendimento/{id}', [ClientController::class, 'editAtendimento'])->name('client.edit.atendimento');
    Route::post('/client/update/atendimento', [ClientController::class, 'updateAtendimento'])->name('client.update.atendimento');
    Route::get('/clients/deleted/{id}', [ClientController::class, 'deletedAtendimento'])->name('client.deleted.atendimento');
    Route::get('/client/destroy/{id}', [ClientController::class, 'destroyAtendimento'])->name('client.destroy.atendimento');

    // horario
    Route::get('/client/create/horario', [HorarioController::class, 'createHorario'])->name('client.create.horario');
    Route::post('/client/submit/horario', [HorarioController::class, 'submitHorario'])->name('client.submit.horario');
    Route::get('/client/edit/horario/{id}', [HorarioController::class, 'editHorario'])->name('client.edit.horario');
    Route::post('/client/update/horario', [HorarioController::class, 'updateHorario'])->name('client.update.horario');
    Route::get('/client/deleted/{id}', [HorarioController::class, 'deleteHorario'])->name('client.delete.horario');

    // agendamento para usuario
    Route::get('/agendamentos/horarios/disponiveis', [UsuarioController::class, 'agendarUsuario'])->name('agendamentos.horarios.disponiveis');
    Route::post('/agendamentos/horarios', [UsuarioController::class, 'agendarHorario'])->name('agendamentos.submit.horarios');

    // servicos
    Route::get('/{logomarca}/{ref}', [ServicesController::class, 'index'])->name('services');

    // planos
    Route::get('/planos', [PlansController::class, 'index'])->name('planos');
});
