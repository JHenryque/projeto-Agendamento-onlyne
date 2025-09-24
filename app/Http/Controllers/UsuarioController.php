<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Models\Atendimento;
use App\Models\Empreendedor;
use App\Models\Horarios;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Lang;

class UsuarioController extends Controller
{
    //
    public function agendarUsuario()
    {
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
        // vai pegar o horario so que for verdadeiro
        //-----------------------------------------
//        $horarios = Horarios::all()->reject(function (Horarios $horario) {
//                return  $horario->active === 0;
//        })->map(function (Horarios $horario) {
//            return $horario->times;
//        });


//        $start = Carbon::now()->startOfWeek(); // segunda
//        $end   = Carbon::now()->endOfWeek();   // domingo
//        // pega a segunda-feira desta semana
//        $start = Carbon::now()->startOfWeek(Carbon::MONDAY);
//        // pega a próxima segunda-feira (7 dias depois)
//        $end = $start->copy()->addWeek();

        Carbon::setLocale('pt_BR'); // define o idioma para português

        $idEmprendedor = Auth::id();

        $start = Carbon::today();             // hoje
        $end   = Carbon::today()->addDays(7); // hoje + 7 dias

        $period = CarbonPeriod::create($start, $end);

        foreach ($period as $date) {
            $dates[] = $date->format('Y-m-d');
        }

        // Buscar todos os agendamentos
        $hoje = Carbon::today()->toDateString();

       $agendamento = Agendamento::where('empreendedor_id', $idEmprendedor)->get();

        $tipoAtendimentos = Atendimento::where('empreendedor_id', $idEmprendedor)->get();

        $horarios = Horarios::where('empreendedor_id', $idEmprendedor)->where('active', 1)->get();

//            foreach ($horarios as $horario) {
//                echo '<pre>';
//                $agendamento = Agendamento::where('empreendedor_id', $idEmprendedor)->whereDate('data', $hoje)
//                    ->where('id_horario', $horario->times)
//                    ->get();
//                var_dump($agendamento);
//                exit();
//            }


        return view('agendar.agendar-usuario', [
            'atendimentos' => $tipoAtendimentos,
            'periods' => $period,
            'horarios' => $horarios,
            'isTrues' => $agendamento,
        ]);
    }

    public function agendarHorario(Request $request)
    {

        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string|regex:/^(\(?\d{2}\)?\s?)?\d{4,5}-\d{4}$/|unique:Agendamentos,phone',
            'data' => 'required|date',
            'atendimento' => 'required',
            'horario' => 'required',
        ],[
            'phone.regex' => 'O formato do campo de telefone é inválido, EX:(XX) XXXXX-XXXX.',
            'phone.unique' => 'Ja existe um agendamento com esse telefone.',
        ]);



        $agendamento = new Agendamento();
        $agendamento->empreendedor_id = Auth::id();
        $agendamento->name = $request->input('name');
        $agendamento->phone = $request->input('phone');
        $agendamento->tipo_atendimento = $request->atendimento;
        $agendamento->data = $request->date('data');
        $agendamento->id_horario = $request->horario;
        $agendamento->save();


//        $horario = Horarios::where('times', $request->input('horario'))->first();
//        $horario->active = 0;
//        $horario->save();

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
