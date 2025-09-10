<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    // home empreendedor
    public function homeEmpreendedor():view
    {

        return view('companies.home');
    }
}
