<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Atendimento;
use App\Models\Empreendedor;
use App\Models\Horarios;
use Carbon\CarbonPeriod;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Ramsey\Collection\Collection;

class ClientController extends Controller
{
    // home empreendedor
    public function homeEmpreendedor():view
    {
        $start = Carbon::now()->startOfWeek(); // segunda
        $end   = Carbon::now()->endOfWeek();   // domingo
        $period = CarbonPeriod::create($start, $end);

        // Buscar todos os agendamentos de hoje
        $hoje = Carbon::today()->toDateString();
        $agendamentosHoje = Agendamento::whereDate('data', $hoje)->get();



//        $agendamentosHoje->searchable();
//


//        echo '<pre>';
//        var_dump($agendamentosHoje->toArray());
//
//        exit();

        $idEmprendedor = Auth::id();

        $horarios = Horarios::orderBy('times', 'asc')->latest()->where('empreendedor_id', $idEmprendedor)->get();

        $horarioIsTrue = Horarios::where('empreendedor_id', $idEmprendedor)->exists();

        return view('companies.home', compact('horarios', 'agendamentosHoje', 'horarioIsTrue'));
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

    public function deletedAtendimento($id)
    {
        $aten = Atendimento::findOrFail($id);

        return view('companies.delete-atendimento', compact('aten'));
    }

    public function destroyAtendimento($id)
    {
        $atendimento = Atendimento::findOrFail($id);
        $atendimento->delete();

        return redirect()->route('empreendedor.create.atendimento')->with('success', 'Atendimento removido com sucesso!');
    }
}
