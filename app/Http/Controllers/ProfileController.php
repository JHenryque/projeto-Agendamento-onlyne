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
}
