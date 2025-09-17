<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Empreendedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $idEmpreendedor = auth()->user()->id;


        $tipoAtendimentos = Atendimento::latest()->where('empreendedor_id',$idEmpreendedor)->get();


        return view('companies.create-atendimento', compact('tipoAtendimentos'));
    }

    public function submitAtendimento(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:100|unique:atendimentos,name',
            'preco' => 'required|regex:/^\d+,\d{2}$/',
        ],
        [
            'name.min' => 'O campo de nome deve ter pelo menos :min caracteres.',
            'name.max' => 'O campo de nome deve ter pelo maximo :max caracteres.',
            'name.unique' => 'O nome escolhido já foi usado.',
            'preco.regex' => 'O formato do campo preco é inválido coloque a virgular Ex: 0,00.',
        ]);

        $atendimento = new Atendimento();
        $atendimento->empreendedor_id =  Auth::user()->id;
        $atendimento->name = $request->input('name');
        $atendimento->preco = $request->input('preco');
        $atendimento->observacao = $request->input('observacao');
        $atendimento->save();

        return redirect()->route('empreendedor.create.atendimento');
    }

    public function editAtendimento($id):view
    {
        $at = Atendimento::findOrFail($id);

        return view('companies.edit-atendimento', compact('at'));
    }

    public function updateAtendimento(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5|max:100',
            'preco' => 'required|regex:/^\d+,\d{2}$/',
        ],
            [
                'name.min' => 'O campo de nome deve ter pelo menos :min caracteres.',
                'name.max' => 'O campo de nome deve ter pelo maximo :max caracteres.',
                'name.unique' => 'O nome escolhido já foi usado.',
                'preco.regex' => 'O formato do campo preco é inválido coloque a virgular Ex: 0,00.',
            ]);

        $atendimento = Atendimento::where('id', $request->id_atendimento)->first();
        $atendimento->name = $request->input('name');
        $atendimento->preco = $request->input('preco');
        $atendimento->observacao = $request->input('observacao');
        $atendimento->save();

        return redirect()->route('empreendedor.create.atendimento');
    }
}
