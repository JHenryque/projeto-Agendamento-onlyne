<?php

namespace App\Http\Controllers;

use App\Models\Empreendedor;
use App\Models\Horarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HorarioController extends Controller
{
    //

    public function createHorario()
    {
        $idEmpreendedor = auth()->user()->id;


        $horarios = Horarios::orderBy('times', 'desc')->latest()->where('empreendedor_id', $idEmpreendedor)->get();

        return view('companies.horarios', compact('horarios'));
    }

    public function submitHorario(Request $request)
    {
        $request->validate([
            'times' => 'required',
        ], ['times.exists' => 'Este horario já existe']);

        if ($request->input('times') === '00:00:00') {
           return redirect()->route('client.create.horario')->with('error', 'ops! Horario invalido!');
        } else if ($request->input('times') <= '00:10:00') {
            return redirect()->route('client.create.horario')->with('error', 'ops! não aceita Horario menor do que 10:00 minutos!');
        } else {

            $horario = new Horarios();
            $horario->empreendedor_id = Auth::user()->id;
            $horario->times = $request->get('times');
            $horario->active = 1;
            $horario->save();

        }

        return redirect()->route('client.create.horario')->with('success', 'Horario cadastrado com sucesso!');
    }

    public function editHorario($id)
    {
        $horario = Horarios::findOrFail($id);

        return view('companies.edit-horario', compact('horario'));
    }

    public function updateHorario(Request $request)
    {
        $request->validate([
            'times' => 'required',
        ], ['times.exists' => 'Este horario já existe']);

        if ($request->input('times') === '00:00:00') {
            return redirect()->route('client.create.horario')->with('error', 'ops! Horario invalido!');
        } else if ($request->input('times') <= '00:10:00') {
            return redirect()->route('client.create.horario')->with('error', 'ops! não aceita Horario menor do que 10:00 minutos!');
        } else {

            $horario = Horarios::where('id', $request->auth_id)->first();
            $horario->times = $request->input('times');
            $horario->active = $request->input('active') === 'on' ? 0 : 1;
            $horario->save();

            return redirect()->route('client.create.horario')->with('success', 'Horario atualizado com sucesso!');
        }
    }

    public function deleteHorario($id)
    {
        $horario = Horarios::findOrFail($id);
        $horario->delete();

        return redirect()->route('client.create.horario')->with('success', 'Horario apagado com sucesso!');
    }
}
