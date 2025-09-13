<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Empreendedor;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ClientController extends Controller
{
    // home empreendedor
    public function homeEmpreendedor():view
    {

        return view('companies.home');
    }

    public function createAtendimento():view
    {
        $tipoAtendimentos = Atendimento::latest()->take(10)->get();



        return view('companies.create-atendimento', compact('tipoAtendimentos'));
    }
}
