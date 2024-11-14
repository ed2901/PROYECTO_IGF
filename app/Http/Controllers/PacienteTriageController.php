<?php

namespace App\Http\Controllers;

use App\Models\PacienteTriage;
use App\Models\Triage;
use App\Models\PacienteRegistroInicial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class PacienteTriageController extends Controller
{
    //Metodos para editar paciente registrado

   
    public function triage($id)
    {
        // Encuentra el paciente por ID
        $paciente = PacienteRegistroInicial::findOrFail($id);

        //Acceso a triages registrados
        $hospitalId = Auth::user()->hospital()->first()->id;
        $triages = Triage::where('hospital', $hospitalId)->get();

        // Retorna la vista de asignacion de triage
        return view('triagepaciente.hacertriage', compact('paciente'), compact('triages'));
    }

    /*
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'genero' => 'required|string|max:255',
            'edad' => 'required|integer',
            'sintomas' => 'required|string|max:255',
        ]);

        // Encuentra el paciente por ID
        $paciente = PacienteRegistroInicial::findOrFail($id);

        // Actualiza los demás campos
        $paciente->nombre = $request->input('nombre');
        $paciente->genero = $request->input('genero');
        $paciente->edad = $request->input('edad');
        $paciente->sintomas = $request->input('sintomas');
        $paciente->save();

        return redirect("/registrarpaciente/verpacientes")->with('success', 'pacientes actualizado correctamente');
    }
         */
        



    public function verpacientes()
    {

        //id del hospital del usuario logueado
        $hospitalId = Auth::user()->hospital()->first()->id;

        // Obtener todos los pacientes 
        $pacientes_reg_inicial = PacienteRegistroInicial::where('hospital', $hospitalId)->get();

        return view('triagepaciente.verpacientes', compact('pacientes_reg_inicial'));
    }


    public function store(Request $request, $id)
    {
        $request->validate([
            'paciente' => 'required|exists:pacientes_reg_inicial,id',
            'temperatura' => 'required|integer',
            'antecedentes' => 'required|string',
            'frec_cardiaca' => 'required|integer',
            'observaciones' => 'required|string',
            'glicemia' => 'required|integer',
            'glasgow' => 'required|integer',
            'triage' => 'required|exists:triages,id',
            
        ]);

        $data = $request->all();

        //$data['estado'] = 'Registrado';
        //$data['codigo'] = rand(1000,9999);
        PacienteTriage::create($data);

        //modificar paciente
        $paciente = PacienteRegistroInicial::findOrFail($id);
        $paciente->estado = 'Asignado';
        $paciente->save();

        //error_log("ID PACIENTE + $id");
        //error_log("PACIENTE ESTADO+ $paciente->estado");
        

        return redirect('/')->with('success', 'Triage asignado correctamente');
    }
}
