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
}
