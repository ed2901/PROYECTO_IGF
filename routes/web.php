<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controlador de hospitales
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PacienteRegistroInicialController;
use App\Http\Controllers\TriageController;

// Registrar paciente
Route::get('/registrarpaciente/regpaciente', function () {
    return view('registrarpaciente.regpaciente');
});
Route::post('/registrarpaciente/regpaciente', [PacienteRegistroInicialController::class, 'store']);

// Ver pacientes en espera con acceso a tabla
Route::get('/registrarpaciente/verpacientes', [PacienteRegistroInicialController::class, 'verpacientes']);

// Editar pacientes
Route::get('/registrarpaciente/{id}/edit', [PacienteRegistroInicialController::class, 'edit'])->name('paciente.edit');
Route::put('/registrarpaciente/{id}', [PacienteRegistroInicialController::class, 'update'])->name('paciente.update');

// Registrar hospital
Route::get('/registrarhospital', function () {
    return view('registrarhospital');
});
Route::post('/registrarhospital', [HospitalController::class, 'store']);

// Ver hospitales con acceso a tabla
Route::get('/verhospitales', [HospitalController::class, 'verhospitales']);

// Editar hospitales
Route::get('/hospital/{id}/edit', [HospitalController::class, 'edit'])->name('hospital.edit');
Route::put('/hospital/{id}', [HospitalController::class, 'update'])->name('hospital.update');

// Rutas para triages
Route::middleware(['auth'])->group(function () {
    // Todos los usuarios pueden crear triages
    Route::get('/triages/create', [TriageController::class, 'create'])->name('triages.create');
    Route::post('/triages', [TriageController::class, 'store'])->name('triages.store');

    // Todos los usuarios pueden ver los triages existentes
    Route::get('/triages', [TriageController::class, 'index'])->name('triages.index');

    // Todos los usuarios pueden editar triages
    Route::get('/triages/{triage}/edit', [TriageController::class, 'edit'])->name('triages.edit');
    Route::put('/triages/{triage}', [TriageController::class, 'update'])->name('triages.update');

    // Eliminar triages
    Route::delete('/triages/{triage}', [TriageController::class, 'destroy'])->name('triages.destroy');
});

// Ruta para la página de inicio (welcome)
Route::get('/', function () {
    return view('inicio'); // Cambia esto si tu vista de inicio es diferente
})->middleware('guest');

// Rutas de autenticación
Auth::routes(); // Esto registra todas las rutas necesarias para autenticación.

// Ruta para el home
Route::get('/home', function () {
    return view('home'); // Asegúrate de tener la vista home.blade.php creada
})->middleware('auth');

// Ruta para el registro de usuarios
Route::get('/register', [RegisterController::class, 'create'])->name('register.create');
