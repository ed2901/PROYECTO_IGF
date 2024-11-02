<?php


namespace App\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class HospitalController extends Controller
{

public function create()
{
    // Obtener todos los hospitales de la base de datos
    $hospitales = Hospital::all();
    
    return view('auth.register', compact('hospitales'));
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
