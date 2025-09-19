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

        $horarios = Horarios::orderBy('times', 'asc')->where('empreendedor_id', $idEmprendedor)->get();


        $tipoAtendimentos = Atendimento::where('empreendedor_id', $idEmprendedor)->get();



        return view('agendar.agendar-usuario', [
            'horarios' => $horarios,
            'atendimentos' => $tipoAtendimentos,
        ]);
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
