<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmPasswordEmail;
use App\Models\Departments;
use App\Models\Empreendedor;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EmpreendedorController extends Controller
{
    //
    public function index(): View
    {
        Auth::user()->can('colaborator') ? : abort(403, 'Você não tem permissão para acessar esta página.');

        $users = User::withTrashed()->with('empreendedor')->where('role', 'empreendedor')->get();

        $cols = User::where('role', 'admin')->OrWhere('role', 'colaborator')->get();

        return view('client.empreendedor', compact('users', 'cols'));
    }

    public function createEmpreendedores(): View
    {
        Auth::user()->can('colaborator') ? : abort(403, 'You are not allowed to access this page');

        $departments = Departments::all();

        return view('client.create-empreendedor', compact('departments',));
    }

    public function submitEmpreendedor(Request $request)
    {
        Auth::user()->can('colaborator') ? : abort(403, 'You are not allowed to access this page');

        $request->validate([
//            'colaborator' => 'required|string|max:255|exists:users,'. Auth::id(),
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users,email',
            'logomarca' => 'required|string|max:255',
            'cpf_cnpj' => 'required|string|min:14|max:14',
            'phone'=>'required|min:11|max:12',
            'address'=>'required|string|max:255',
            'number' => 'required|min:3|max:1000',
            'cidade' => 'required|min:3|max:100',
            'bairro' => 'required|min:3|max:50',
            'cep'=>'required|string|min:8|max:10',
            'select_department'=>'required|exists:departments,id',
        ],
        [
            'cep.min' => 'O campo cep deve ter pelo menos 8 caracteres.',
            'email.unique' => 'O e-mail já foi recebido.',
        ]);


        // create user confirmation token
        $token = Str::random(60);

        // create new rh use
        $user = new User();
        $user->col_id = $request->colaborator_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf_cnpj = bcrypt($request->cpf_cnpj);
        $user->remember_token = $token;
        $user->role = 'empreendedor';
        $user->permissions = '["empreendedor"]';
        $user->department_id = $request->select_department;
        $user->save();


        $user->empreendedor()->create([
            'logomarca' => $request->logomarca,
            'address' => $request->address,
            'phone' => $request->phone,
            'number' => $request->number,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'cep' => $request->cep,
        ]);

        // save user details
        Mail::to($request->user())->send(new ConfirmPasswordEmail(route('confirm-account', $token)));

        if(!$user)
        {
            return redirect()->route('login')->with('error', 'Ocorreu um erro ao enviar o e-mail.');
        }

        return redirect()->route('empreendedor')->with('success', 'O foi enviado com sucesso. Verifique no Email na caixa de mensagem.');

    }
}
