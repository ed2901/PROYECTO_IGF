<?php

namespace App\Http\Controllers;

use App\Models\Triage;
use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TriageController extends Controller
{
    // Mostrar todos los triages del hospital del usuario autenticado
    public function index()
    {
        // Obtener el hospital del usuario autenticado
        $hospitalId = Auth::user()->hospital_id;

        // Obtener los triages asociados al hospital del usuario autenticado
        $triages = Triage::where('hospital_id', $hospitalId)->get();

        // Retorna la vista con los triages del hospital
        return view('triages.indexTriage', compact('triages'));
    }

    // Mostrar el formulario para crear un nuevo triage
    public function create()
    {
        // Obtener el hospital del usuario autenticado
        $hospitalId = Auth::user()->hospital_id;

        // Verificar si el hospital existe
        $hospital = Hospital::findOrFail($hospitalId);

        // Retorna la vista del formulario de creación con el hospital
        return view('triages.createTriage', compact('hospital'));
    }

    // Almacenar un nuevo triage en la base de datos
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'codigo' => 'required|string|max:255|unique:triages', // Código único
            'descripcion' => 'required|string|max:255', // Descripción requerida
            'prioridad' => 'required|integer', // Prioridad requerida
        ]);

        // Obtener el hospital del usuario autenticado
        $hospitalId = Auth::user()->hospital_id;

        // Crear el triage con los datos validados y asignar el hospital_id
        Triage::create([
            'codigo' => $request->codigo,
            'descripcion' => $request->descripcion,
            'prioridad' => $request->prioridad,
            'hospital_id' => $hospitalId, // Asignar el hospital del usuario
        ]);

        // Redirigir a la lista de triages con un mensaje de éxito
        return redirect()->route('triages.index')->with('success', 'Triage creado exitosamente.');
    }

    // Mostrar el formulario para editar un triage existente
    public function edit(Triage $triage)
    {
        // No hay restricción de roles o hospital para editar, cualquier usuario autenticado puede editar
        return view('triages.editTriage', compact('triage'));
    }

    // Actualizar un triage existente en la base de datos
    public function update(Request $request, Triage $triage)
    {
        // Validar los datos del formulario
        $request->validate([
            'codigo' => 'required|string|max:255|unique:triages,codigo,' . $triage->id, // Código único, excluyendo el actual
            'descripcion' => 'required|string|max:255', // Descripción requerida
            'prioridad' => 'required|integer', // Prioridad requerida
        ]);

        // Actualizar el triage con los datos validados
        $triage->update($request->all());

        // Redirigir a la lista de triages con un mensaje de éxito
        return redirect()->route('triages.index')->with('success', 'Triage actualizado exitosamente.');
    }

    // Eliminar un triage de la base de datos
    public function destroy(Triage $triage)
    {
        // Eliminar el triage
        $triage->delete();

        // Redirigir a la lista de triages con un mensaje de éxito
        return redirect()->route('triages.index')->with('success', 'Triage eliminado exitosamente.');
    }
}
