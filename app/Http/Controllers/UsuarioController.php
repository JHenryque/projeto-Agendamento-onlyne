<?php

namespace App\Http\Controllers;

use App\Models\Atendimento;
use App\Models\Empreendedor;
use App\Models\Horarios;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class UsuarioController extends Controller
{
    //
    public function agendarUsuario()
    {
        // Buscar todos os agendamentos de hoje
//        $hoje = Carbon::today()->toDateString();
//        $agendamentosHoje = Agendamento::whereDate('data', $hoje)->get();
        //-------------------------


        //Buscar um horário específico de hoje
//        $hoje = Carbon::today()->toDateString();
//        $hora = '14:00'; // exemplo de horário buscado
//
//        $agendamento = Agendamento::whereDate('data', $hoje)
//            ->where('hora', $hora)
//            ->first();
        //----------------

        //Verificar se um horário está disponível hoje
//        $hoje = Carbon::today()->toDateString();
//        $hora = '10:00';
//
//        $ocupado = Agendamento::whereDate('data', $hoje)
//            ->where('hora', $hora)
//            ->exists();
//
//        if ($ocupado) {
//            echo "Esse horário já está ocupado!";
//        } else {
//            echo "Horário disponível!";
//        }

       $idEmprendedor = Auth::id();

        // vai pegar o horario so que for verdadeiro
        //-----------------------------------------
//        $horarios = Horarios::all()->reject(function (Horarios $horario) {
//                return  $horario->active === 0;
//        })->map(function (Horarios $horario) {
//            return $horario->times;
//        });

        $tipoAtendimentos = Atendimento::where('empreendedor_id', $idEmprendedor)->get();

        $horarios = Horarios::where('empreendedor_id', $idEmprendedor)->Where('active', 1)->get();


        return view('agendar.agendar-usuario', [
            'atendimentos' => $tipoAtendimentos,
            'horarios' => $horarios,
        ]);
    }

    public function agendarHorario(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string|regex:/^(\(?\d{2}\)?\s?)?\d{4,5}-\d{4}$/',
            'atendimento' => 'required|array',
            'horario' => 'required',
        ],['phone.regex' => 'O formato do campo de telefone é inválido, EX:(XX) XXXXX-XXXX.'
        ]);

        $agendamento = new Atendimento();
        $agendamento->empreendedor_id = Auth::id();
        $agendamento->name = $request->input('name');
        $agendamento->phone = $request->input('phone');
        $agendamento->tipo_atendimento = $request->input('["atendimento"]');
        $agendamento->data = $request->input('data');
        $agendamento->horario = $request->input('horario');
        $agendamento->save();

        $horario = Horarios::where('id', $request->input('horario'))->first();
        $horario->active = 0;
        $horario->save();

        return redirect()->route('home')->with('success', 'Atendimento cadastrado com sucesso!');

    }


// Criando um método no Controller
    public function buscarHorarioHoje(Request $request)
    {
//        $request->validate([
//            'hora' => 'required'
//        ]);
//
//        $hoje = now()->toDateString();
//
//        $agendamento = Agendamento::whereDate('data', $hoje)
//            ->where('hora', $request->hora)
//            ->first();
//
//        if ($agendamento) {
//            return response()->json([
//                'status' => 'ocupado',
//                'dados' => $agendamento
//            ]);
//        }
//
//        return response()->json([
//            'status' => 'disponivel',
//            'mensagem' => 'Horário livre'
//        ]);
    }
}
