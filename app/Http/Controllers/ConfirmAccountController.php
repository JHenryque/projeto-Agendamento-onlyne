<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class ConfirmAccountController extends Controller
{
    // verificar se o token e valido
    public function confirmConta($token)
    {
        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            abort(404, 'token é invalido');
        }

        return view('auth.confirm-account', compact('user'));
    }

    public function confirmAccountSubmit(Request $request)
    {
        $request->validate([
            'token' => 'required|string|size:60',
            'password' => 'required|min:8|confirmed|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z0-9]+$/',
            'password_confirmation' => 'required',
        ],[
            'password.min' => 'O campo de senha deve ter pelo menos 8 caracteres.',
            'password.regex' => 'O formato do campo de senha é inválido, tente colocar letra maiuscula, minuscula e numeros.',
            'password.confirmed' => 'O campo de senha deve ser iguais.',
        ]);

        $user = User::where('remember_token', $request->token)->first();

        $user->password = bcrypt($request->password);
        $user->remember_token = null;
        $user->email_verified_at = now();
        $user->save();

        return view('auth.welcome', compact('user'));
    }

    public function alteraPassword($token) {

        $user = User::where('remember_token', $token)->first();

        if (!$user) {
            abort(404, 'Invalid confirmation token');
        }

        return view('user.altera-password' , compact('user'));
    }

    public function alteraPasswordUpdate(Request $request) {
        // form validation
        $request->validate([
            'token' => 'required|string|size:60',
            'password' => 'required|min:8|confirmed|max:20|regex:/^(?=.*[a-z])(?=.*\d).+$/',
            'password_confirmation' => 'required',
        ],[
            'password.confirmed' => 'A confirmação do campo de senha não corresponde.',
            'password.regex' => 'O formato do campo de senha é inválido',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'password.max' => 'A senha deve ter pelo menos :max caracteres.',
        ]);


        $user = User::where('remember_token', $request->token)->first();
        $user->password = bcrypt($request->password);
        $user->remember_token = null;
        $user->save();

        return redirect()->route('user.profile')->with('success', 'Senha alterada com sucesso!');
    }
}
