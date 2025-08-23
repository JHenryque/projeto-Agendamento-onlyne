<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
            'cep' => 'required|min:8|max:8',
        ]);

        return redirect()->route('user.profile')->with('success', 'Dados atualizados com sucesso! ;)');
    }
}
