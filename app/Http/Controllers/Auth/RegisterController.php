<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Hospital; // Importa el modelo Hospital
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Método para mostrar el formulario de registro
    public function create()
    {
        // Obtener todos los hospitales para mostrarlos en el formulario de registro
        $hospitales = Hospital::all();
        return view('auth.register', compact('hospitales')); // Pasa la lista de hospitales a la vista
    }

    // Método para registrar un nuevo usuario
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'roles' => 'required',
            'hospital' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'rol' => $request->roles,
            'hospital' => $request->hospital,
        ]);

        return redirect()->route('login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
    }
}
