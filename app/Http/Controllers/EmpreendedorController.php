<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EmpreendedorController extends Controller
{
    //
    public function index(): View
    {
        Auth::user()->can('colaborator') ? : abort(403, 'Você não tem permissão para acessar esta página.');

        $empreendedores = User::withTrashed()->with('empreendedores')->where('role', 'empreendedor')->get();


        return view('client.empreendedor', compact('empreendedores'));
    }

    public function createEmpreendedores(): View
    {
        Auth::user()->can('colaborator') ? : abort(403, 'You are not allowed to access this page');

        $departments = Departments::all();

        return view('client.create-empreendedor', compact('departments'));
    }

    public function submitEmpreendedor(Request $request)
    {
        Auth::user()->can('colaborator') ? : abort(403, 'You are not allowed to access this page');

        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users,email',
            'logomarca' => 'required|string|max:255',
            'doc' => 'required|string|max:255|unique:users,doc|min:14|max:14',
            'phone'=>'required|min:11|max:12',
            'address'=>'required|string|max:255',
            'number' => 'required|min:3|max:1000',
            'cidade' => 'required|min:3|max:100',
            'bairro' => 'required|min:3|max:50',
            'cep'=>'required|string|max:10',
            'select_department'=>'required|exists:departments,id',
        ]);

        $colaborator = User::findOrFail(Auth::id());

        dd($colaborator);
        echo 'ID colaborador: ' . $request . '<br>';
    }
}
