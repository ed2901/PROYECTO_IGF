<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Controlador de hospitales
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PacienteRegistroInicialController;
use App\Http\Controllers\MonitoreoController;
use App\Http\Controllers\PacienteTriageController;
use App\Http\Controllers\AtenderPacienteController;
use App\Http\Controllers\TriageController;


//                                   Atender Pacientes                                    //


//ver estado de pacientes en tiempo real 
Route::get('/monitoreo/verpacientes', [MonitoreoController::class, 'monitoreo']);
Route::get('/monitoreo/{id}/info', [MonitoreoController::class, 'info'])->name('paciente.info');



//                                   Atender Pacientes                                    //


// Ver pacientes con triage realizado
Route::get('/atenderpaciente/verpacientes', [AtenderPacienteController::class, 'verpacientes']);
//realizar atencion por id
Route::get('/atenderpaciente/{id}/atender', [AtenderPacienteController::class, 'atender'])->name('paciente.atender');
Route::put('/atenderpaciente/{id}', [AtenderPacienteController::class, 'store'])->name('paciente.editarestado');






//                                   Triage en Pacientes                                  //

// Ver pacientes en espera con acceso a tabla
Route::get('/triagepaciente/verpacientes', [PacienteTriageController::class, 'verpacientes']);

//realizar triage por id
Route::get('/triagepaciente/{id}/triage', [PacienteTriageController::class, 'triage'])->name('paciente.triage');
Route::put('/triagepaciente/{id}', [PacienteTriageController::class, 'store'])->name('paciente.hacertriage');


//                                   Registrar Pacientes                                  //


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


//                                   Hospitales                                       //


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


//                                   Registrar Triages                                  //


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


//                                   Paginas de Inicio y Usuarios                         //


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
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register.create');
