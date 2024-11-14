<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PacienteTriage;
use App\Models\PacienteRegistroInicial;
use Illuminate\Support\Facades\Auth;



class AtenderPacienteController extends Controller
{
    public function verpacientes()
    {
        //id del hospital del usuario logueado
        $hospitalId = Auth::user()->hospital()->first()->id;

        // Obtener todos los pacientes 
        $pacientes_reg_inicial = PacienteRegistroInicial::where('hospital', $hospitalId)->get();
        
        $pacientes_triage = PacienteTriage::all();

        return view('atenderpaciente.verpacientes', compact('pacientes_reg_inicial'), compact('pacientes_triage'));
    }

    public function atender($id)
    {
        // Encuentra el paciente por ID
        $paciente = PacienteRegistroInicial::findOrFail($id);

        $paciente_triage = PacienteTriage::where('paciente', $id)->first();

        // Retorna la vista de asignacion de triage
        return view('atenderpaciente.atenderpaciente', compact('paciente'), compact('paciente_triage'));
    }

    public function store(Request $request, $id)
    {
        
        //modificar paciente
        $paciente = PacienteRegistroInicial::findOrFail($id);
        $paciente->estado = 'Atendido';
        $paciente->save();

        //error_log("ID PACIENTE + $id");
        //error_log("PACIENTE ESTADO+ $paciente->estado");
        

        return redirect('/')->with('success', 'Paciente atendido correctamente');
    }
}
