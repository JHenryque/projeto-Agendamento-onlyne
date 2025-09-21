<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmAccountEmail;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // get o perfil
    public function index() {

        $users = User::with('adresses', 'department')->findOrFail(auth()->id());

        return view('user.profile', compact('users'));
    }

    // updade usuario
    public function updateProfile(Request $request) {
        $request->validate([
            'phone' => 'required|min:11|max:15',
            'address' => 'required|min:3|max:150',
            'number' => 'required|min:3|max:1000',
            'cidade' => 'required|min:3|max:100',
            'bairro' => 'required|min:3|max:50',
            'cep' => 'required|min:8|max:10',
        ]);

        $user = User::with('adresses', 'empreendedor')->findOrFail(auth()->id());
        if($user->role === 'colaborator') {
            $user->adresses->phone = $request->input('phone');
            $user->adresses->address = $request->input('address');
            $user->adresses->number = $request->input('number');
            $user->adresses->cidade = $request->input('cidade');
            $user->adresses->bairro = $request->input('bairro');
            $user->adresses->cep = $request->input('cep');
            $user->adresses->save();
        } else {
//            $user->empreendedor->phone = $request->input('phone');
            $user->empreendedor->address = $request->input('address');
            $user->empreendedor->number = $request->input('number');
            $user->empreendedor->cidade = $request->input('cidade');
            $user->empreendedor->bairro = $request->input('bairro');
            $user->empreendedor->cep = $request->input('cep');
            $user->empreendedor->save();
        }


       return redirect()->back()->with('success', 'Dados atualizados com sucesso! ;)');
    }

    // interface para altera a senha
    public function editePassword() {
        return view('user.edite-password');
    }

    // Password update confirmation codigo, sera criado um codigo gerado alternado
    public function updatePassword(Request $request) {

        $request->validate([
            'email' => 'required|email|exists:users,email',
        ],[
            'email.exists' => 'O e-mail selecionado é inválido.',
        ]);

        //$user = User::first('id');
        $numero = (int) implode('', collect(range(1, 6))->map(fn() => rand(0, 9))->toArray());


        //$token = Str::random(60);

        $user = User::findOrFail($request->user()->id);
        $user->confirmation_code = $numero;
        $user->save();

        if($user)
        {
            Mail::to($request->user())->send(new ConfirmAccountEmail($numero));
        }


        return redirect()->route('user.profile.codigo-active');
    }

    // alteraçao da senha pelo usuario confirmaçao do codigo
    public function updatePasswordConfirm(Request $request) {
        // form validation

        $request->validate([
            'password' => 'required|min:8|max:20|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[A-Za-z0-9]+$/',
            'password_confirmation' => 'required|same:password',
        ],[
            'password_confirmation.same' => 'A confirmação do campo de senha não corresponde.',
            'password.regex' => 'O formato do campo de senha é inválido',
            'password.min' => 'A senha deve ter pelo menos :min caracteres.',
            'password.max' => 'A senha deve ter pelo menos :max caracteres.',
        ]);


        //$numero = (int) implode('', collect(range(1, 6))->map(fn() => rand(0, 9))->toArray());

        $user = User::findOrFail($request->user()->id);
        $user->confirmation_code = null;
        $user->password = bcrypt($request->password);
        $user->updated_at = Carbon::now();
        $user->save();

        return redirect()->route('user.profile')->with('success', 'A senha atualizada com sucesso!');

    }

    // pagina html ativaçao do codigo para auterar o password
    public function codigoActive():View
    {
        return view('user.active-codigo');
    }

    // interface alteraçao pelo codigo
    public function alteraPassword():View
    {
        $user = Auth::user();

        return view('user.altera-password', compact('user'));
    }

}
