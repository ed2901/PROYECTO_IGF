<?php

namespace App\Http\Controllers;

use App\Models\PacienteTriage;
use App\Models\PacienteRegistroInicial;
use App\Models\Triage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


use Illuminate\Http\Request;

class MonitoreoController extends Controller
{
    public function monitoreo()
    {
        $hospitalId = Auth::user()->hospital()->first()->id;
        // Obtener todos los pacientes del hospital
    $pacientes_reg_inicial = PacienteRegistroInicial::where('hospital', $hospitalId)->get();
    $paciente_triage = PacienteTriage::whereHas('pacienteRel', function ($query) use ($hospitalId) {
        $query->where('hospital', $hospitalId);
    })->get();

    // Obtener todos los triages
    $triages = Triage::all();

    // Contar el número de pacientes por cada color de triage
    $estadisticas_triage = [];

    foreach ($triages as $triage) {
        $conteo = $paciente_triage->where('triage', $triage->id)->count();
        $estadisticas_triage[$triage->codigo] = $conteo;
    }

    // Contar el número de pacientes por estado "Asignado" y "Atendido"
    $pacientes_asignados = $pacientes_reg_inicial->where('estado', 'Asignado')->count();
    $pacientes_atendidos = $pacientes_reg_inicial->where('estado', 'Atendido')->count();

    // Pasar los datos a la vista
    return view('monitoreo.verpacientes', compact('pacientes_reg_inicial', 'paciente_triage', 'triages', 'estadisticas_triage', 'pacientes_asignados', 'pacientes_atendidos'));
}

    public function info($id)
    {
        // Encuentra el paciente por ID
        $paciente = PacienteRegistroInicial::findOrFail($id);

        $paciente_triage = PacienteTriage::where('paciente', $id)->first();

        // Retorna la vista de asignacion de triage
        return view('monitoreo.infopaciente', compact('paciente'), compact('paciente_triage'));
    }
}
