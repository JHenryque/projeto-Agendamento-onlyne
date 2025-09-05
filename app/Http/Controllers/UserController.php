<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index():View
    {
        return view('home');
    }

    public function userDetails($id):View
    {
        $user = User::with('adresses')->findOrFail($id);

        return view('user.user-details', compact('user'));
    }

}
