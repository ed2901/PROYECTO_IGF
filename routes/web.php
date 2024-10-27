<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

// Ruta para la página de inicio (welcome)
Route::get('/', function () {
    return view('welcome'); // Cambia esto si tu vista de inicio es diferente
});

// Rutas de autenticación
Auth::routes(); // Esto registra todas las rutas necesarias para autenticación.

// Ruta para el home
Route::get('/home', function () {
    return view('home'); // Asegúrate de tener la vista home.blade.php creada
})->middleware('auth')->name('home');
