<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmPasswordEmail;
use App\Models\Departments;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EmpreendedorController extends Controller
{
    //pagina liberado para admin e colaborador do Empreendedor
    public function index(): View
    {
        Auth::user()->can('colaborator') ? : abort(403, 'Você não tem permissão para acessar esta página.');

        $users = User::withTrashed()->with('empreendedor')->where('role', 'empreendedor')->get();

        $cols = User::where('role', 'admin')->OrWhere('role', 'colaborator')->get();

        return view('client.empreendedor', compact('users', 'cols'));
    }

    // Crear novo Empreendedor
    public function createEmpreendedores(): View
    {
        Auth::user()->can('colaborator') ? : abort(403, 'You are not allowed to access this page');

        $departments = Departments::all();

        return view('client.create-empreendedor', compact('departments'));
    }

    // post submit Empreendedor
    public function submitEmpreendedor(Request $request)
    {
        Auth::user()->can('colaborator') ? : abort(403, 'Você não tem permissão para acessar esta página.');

        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users,email',
            'logomarca' => 'required|string|max:255',
            'cpf_cnpj' => 'required|string|min:14|max:14|unique:users,cpf_cnpj',
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
        $user->cpf_cnpj = Crypt::encryptString($request->cpf_cnpj);
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

    // edita empreendedeor
    public function editEmpreendedor(int $id): View
    {
        Auth::user()->can('colaborator') ? : abort(403, 'Você não tem permissão para acessar esta página.');

//        $cpf = User::where('id', $id)->firstOrFail()->cpf_cnpj;
//        $cpf_cnpj = Crypt::decryptString($cpf);

        $user = User::with('empreendedor')->findOrFail($id);

        return view('client.edit-empreendedor', compact('user'));
    }

    // editando empreendedor
    public function updateEmpreendedor(Request $request)
    {
        Auth::user()->can('colaborator') ? : abort(403, 'Você não tem permissão para acessar esta página.');

        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|min:10|max:255|email',
            'logomarca' => 'required|string|max:255',
            'cpf_cnpj' => 'required|string|min:14|max:14|unique:users,cpf_cnpj',
            'phone'=>'required|min:11|max:12',
            'address'=>'required|string|max:255',
            'number' => 'required|min:3|max:1000',
            'cidade' => 'required|min:3|max:100',
            'bairro' => 'required|min:3|max:50',
            'cep'=>'required|string|min:8|max:10',
        ],
            [
                'cep.min' => 'O campo cep deve ter pelo menos 8 caracteres.',
            ]);

        // editar empreendedor
        $user = User::with('empreendedor')->findOrFail($request->idEmpreededor);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->cpf_cnpj = Crypt::encryptString($request->cpf_cnpj);
        $user->save();


        $user->empreendedor()->update([
            'logomarca' => $request->logomarca,
            'phone' => $request->phone,
            'address' => $request->address,
            'number' => $request->number,
            'bairro' => $request->bairro,
            'cidade' => $request->cidade,
            'cep' => $request->cep,
        ]);

        return redirect()->route('empreendedor')->with('success', 'O foi atualizado com sucesso.');
    }

    public function deleteEmpreendedor(int $id): View
    {
        Auth::user()->can('colaborator') ? : abort(403, 'Você não tem permissão para acessar esta página.');

        $user = User::with('empreendedor')->findOrFail($id);
        return view('client.delete-empreendedor', compact('user'));
    }

    public function destroyEmpreendedor(int $id)
    {
        Auth::user()->can('colaborator') ? : abort(403, 'Você não tem permissão para acessar esta página.');

        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('empreendedor')->with('success', 'O foi removido com sucesso.');
    }

    public function detailsEmpreendedor(int $id): View
    {
        $user = User::with('empreendedor')->findOrFail($id);

        return view('client.details-empreendedor', compact('user'));
    }

    public function restoreEmpreendedor(int $id)
    {
        $user = User::withTrashed()->with('empreendedor')->findOrFail($id);
        $user->restore();

        return redirect()->route('empreendedor')->with('success', 'O foi restaurado com sucesso.');
    }
}
