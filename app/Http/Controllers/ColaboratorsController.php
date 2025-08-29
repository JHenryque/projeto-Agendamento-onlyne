<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ColaboratorsController extends Controller
{
    public function index(): View
    {
        Auth::user()->can('admin') ? : abort(403, 'Você não tem permissão para acessar esta página.');

        $colaborators = User::with('user_adresses', 'department')->where('role', '<>', 'admin')->get();

        return view('colaboration.colaborators', compact('colaborators'));
    }

    public function createColaborator(): View
    {
        Auth::user()->can('admin') ? : abort(403, 'You are not allowed to access this page');

        $departments = Departments::all();

        return view('colaboration.create-colaborator', compact('departments'));
    }

    public function colaboratorSubmit(Request $request)
    {
        Auth::user()->can('admin') ? : abort(403, 'You are not allowed to access this page');

        $request->validate([
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255|unique:users,email',
            'select_department'=>'required|exists:departments,id',
            'address'=>'required|string|max:255',
            'zip_code'=>'required|string|max:10',
            'city'=>'required|string|max:50',
            'phone'=>'required|string|max:50',
            'salary'=>'required|decimal:2',
            'admission_date'=>'required|date_format:Y-m-d',
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
        $user->confirmation_token = $token;
        $user->role = 'rh';
        $user->department_id = $request->select_department;
        $user->permissions = '["rh"]';
        $user->save();

        // save user details
    }
}
