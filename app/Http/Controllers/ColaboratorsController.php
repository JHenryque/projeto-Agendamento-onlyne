<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmAccountEmail;
use App\Mail\ConfirmPasswordEmail;
use App\Models\Departments;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;


class ColaboratorsController extends Controller
{
    public function index(): View
    {
        Auth::user()->can('admin') ? : abort(403, 'Você não tem permissão para acessar esta página.');

        $colaborators = User::with('adresses')->where('role', 'colaborator')->orWhere('role', 'admin')->get();

        return view('colaboration.colaborators', compact('colaborators'));
    }

    public function homeColaborators(): View
    {
        $colaborators = User::with('adresses', 'department')->where('role',  'colaborador')->get();

        return view('colaboration.home', compact('colaborators'));
    }

    public function createColaborator(): View
    {
        Auth::user()->can('admin') ? : abort(403, 'You are not allowed to access this page');

        $departments = Departments::all();

        return view('colaboration.create-colaborator', compact('departments'));
    }

    public function colaboratorSubmit(Request $request)
    {
        Auth::user()->can('admin') ? : abort(403, 'Você não tem permissão para acessar esta página');

        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users,email',
            'select_department'=>'required|exists:departments,id',
            'phone'=>'required|min:11|max:12',
            'address'=>'required|string|max:255',
            'number' => 'required|min:3|max:1000',
            'cidade' => 'required|min:3|max:100',
            'bairro' => 'required|min:3|max:50',
            'cep'=>'required|string|max:10',
        ]);

        // check if department id === 2
        if ($request->select_department != 2)
        {
            return redirect()->route('home');
        }

        // create user confirmation token
        $token = Str::random(60);

        // create new rh use
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->remember_token = $token;
        $user->role = 'colaborator';
        $user->permissions = '["colaborator"]';
        $user->department_id = $request->select_department;
        $user->save();

        $user->adresses()->create([
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

        return redirect()->route('colaboration')->with('success', 'O foi enviado com sucesso.');
    }

    public function editColaborator($id):view
    {
        Auth::user()->can('admin') ? : abort(403, 'Você não tem permissão para acessar esta página');

        $colaborator = User::with('adresses')->where('role', 'colaborator')->findOrFail($id);

        $departments = Departments::all();

        return view('colaboration.edit-colaborator', compact('colaborator', 'departments'));
    }

    public function updateColaborator(Request $request)
    {
        Auth::user()->can('admin') ? : abort(403, 'Você não tem permissão para acessar esta página');

        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users,email',
            'select_department'=>'required|exists:departments,id',
            'phone'=>'required|min:11|max:12',
            'address'=>'required|string|max:255',
            'number' => 'required|min:3|max:1000',
            'cidade' => 'required|min:3|max:100',
            'bairro' => 'required|min:3|max:50',
            'cep'=>'required|string|max:10',
        ]);
    }
}
