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

class ProfileController extends Controller
{
    // get o perfil
    public function index() {

        $users = User::with('adresses', 'department')->findOrFail(auth()->id());

        return view('user.profile', compact('users'));
    }

    public function updateProfile(Request $request) {
        $request->validate([
            'phone' => 'required|min:11|max:15',
            'address' => 'required|min:3|max:150',
            'number' => 'required|min:3|max:1000',
            'cidade' => 'required|min:3|max:100',
            'bairro' => 'required|min:3|max:50',
            'cep' => 'required|min:9|max:10',
        ]);

        $user = User::with('adresses')->findOrFail(auth()->id());
        $user->adresses->phone = $request->input('phone');
        $user->adresses->address = $request->input('address');
        $user->adresses->number = $request->input('number');
        $user->adresses->cidade = $request->input('cidade');
        $user->adresses->bairro = $request->input('bairro');
        $user->adresses->cep = $request->input('cep');
        $user->adresses->save();


       return redirect()->back()->with('success', 'Dados atualizados com sucesso! ;)');
    }

    public function editePassword() {
        return view('user.edite-password');
    }

    public function updatePassword(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = User::first('id');


        Mail::to($request->user())->send(new ConfirmAccountEmail(route('altera.password', $user)));

        return redirect()->back();
    }

}
