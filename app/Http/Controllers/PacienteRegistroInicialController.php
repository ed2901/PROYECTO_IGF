<?php

namespace App\Http\Controllers;

use App\Models\PacienteRegistroInicial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PacienteRegistroInicialController extends Controller
{
    //Metodos para editar paciente registrado

    public function edit($id)
    {
        // Encuentra el paciente por ID
        $paciente = PacienteRegistroInicial::findOrFail($id);

        // Retorna la vista de edición con los datos del paciente
        return view('registrarpaciente.editarpaciente', compact('paciente'));
    }

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



    public function verpacientes()
    {
        //id del hospital del usuario logueado
        $hospitalId = Auth::user()->hospital()->first()->id;

        // Obtener todos los pacientes 
        $pacientes_reg_inicial = PacienteRegistroInicial::where('hospital', $hospitalId)->get();

        return view('registrarpaciente.verpacientes', compact('pacientes_reg_inicial'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'genero' => 'required|string|max:10',
            'edad' => 'required|integer',
            'fecha' => 'required|date',
            'sintomas' => 'required|string',
            'registrante' => 'required|exists:users,id',
            'hospital' => 'required|exists:hospitales,id',
            
        ]);

        $data = $request->all();
        //en espera al registralos
        $data['estado'] = 'En espera';

        PacienteRegistroInicial::create($data);

        return redirect('/')->with('success', 'Hospital añadido correctamente!');
    }
}
