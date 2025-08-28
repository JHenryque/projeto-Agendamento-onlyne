<?php

namespace App\Http\Controllers;

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
}
