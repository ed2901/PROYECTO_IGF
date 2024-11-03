<?php


namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HospitalController extends Controller
{


    //Metodos para editar hospital registrado

    public function edit($id)
    {
        // Encuentra el hospital por ID
        $hospital = Hospital::findOrFail($id);

        // Retorna la vista de edición con los datos del hospital
        return view('editarhospital', compact('hospital'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Encuentra el hospital por ID
        $hospital = Hospital::findOrFail($id);

        // Maneja la actualización del logo si hay uno nuevo
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
            $hospital->logo = $logoPath;
        }

        // Actualiza los demás campos
        $hospital->nombre = $request->input('nombre');
        $hospital->direccion = $request->input('direccion');
        $hospital->descripcion = $request->input('descripcion');
        $hospital->save();

        return redirect("/verhospitales")->with('success', 'Hospital actualizado correctamente');
    }

public function create()
{
    // Obtener todos los hospitales de la base de datos para blade de registrar usuario
    $hospitales = Hospital::all();

    return view('auth.register', compact('hospitales'));
}

public function verhospitales()
{
    // Obtener todos los hospitales de la base de datos para blade de registrar usuario
    $hospitales = Hospital::all();

    return view('verhospitales', compact('hospitales'));
}


    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', 

        ]);

        // Handle file upload if there's a file
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('logos', 'public');
        }

        $hospitales = Hospital::create([
            'nombre' => $request->input('nombre'),
            'direccion' => $request->input('direccion'),
            'descripcion' => $request->input('descripcion'),
            'logo' => $logoPath,
        ]);

        return redirect('/')->with('success', 'Hospital añadido correctamente!');
    }
}
