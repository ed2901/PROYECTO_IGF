<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

//controlador de hospitales
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\Auth\RegisterController;


Route::get('/registrarhospital', function () {
    return view('registrarhospital');
});

Route::post('/registrarhospital', [HospitalController::class, 'store']);

//ver hospitales con accceso a tabla
Route::get('/verhospitales', [HospitalController::class, 'verhospitales']);

//editar hospitales
Route::get('/hospital/{id}/edit', [HospitalController::class, 'edit'])->name('hospital.edit');
Route::put('/hospital/{id}', [HospitalController::class, 'update'])->name('hospital.update');


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

Route::get('/register', [HospitalController::class, 'create'])->name('register.create');
