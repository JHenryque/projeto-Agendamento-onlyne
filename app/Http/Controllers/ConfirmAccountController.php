<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ConfirmAccountController extends Controller
{
    // verificar se o token e valido
    public function confirmAccount(User $user)
    {
        $user = User::findOrFail($user->id);
        if (!$user) {
            abort(404, 'token é invalido');
        }

        return view('auth.confirm-account', compact('user'));
    }

    public function alteraPassword($token) {

        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            abort(404, 'Invalid confirmation token');
        }

        return view('user.altera-password' , compact('user'));
    }
}
