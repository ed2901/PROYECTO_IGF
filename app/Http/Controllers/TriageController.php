<?php

namespace App\Http\Controllers;

use App\Models\Triage;
use Illuminate\Http\Request;

class TriageController extends Controller
{
    // Mostrar todos los triages
    public function index()
    {
        $triages = Triage::all(); // Obtiene todos los triages
        return view('triages.indexTriage', compact('triages')); // Retorna la vista con los triages
    }

    // Mostrar el formulario para crear un nuevo triage
    public function create()
    {
        return view('triages.createTriage'); // Retorna la vista del formulario de creación
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

        // Crear el triage con los datos validados
        Triage::create($request->all());

        // Redirigir a la lista de triages con un mensaje de éxito
        return redirect()->route('triages.index')->with('success', 'Triage creado exitosamente.');
    }

    // Mostrar el formulario para editar un triage existente
    public function edit(Triage $triage)
    {
        return view('triages.editTriage', compact('triage')); // Retorna la vista de edición con el triage
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
        $triage->delete(); // Eliminar el triage
        return redirect()->route('triages.index')->with('success', 'Triage eliminado exitosamente.'); // Redirigir con mensaje de éxito
    }
}
