@extends('layouts.app')

@section('nav-home')
<a href="{{ url()->previous() }}" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Registro de Paciente</a>
@endsection

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold text-center mb-6">Registrar un Paciente</h2>

    <form action="{{ url('/registrarpaciente/regpaciente') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>
        <div class="mb-4">
    <label for="genero" class="block text-gray-700 font-medium mb-2">Género:</label>
    <select id="genero" name="genero" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
        <option value="">Seleccione</option>
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select>
</div>
        <div class="mb-4">
            <label for="edad" class="block text-gray-700 font-medium mb-2">Edad:</label>
            <input type="number" id="edad" name="edad" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>
        <div class="mb-4">
    <label for="fechaHora" class="block text-gray-700 font-medium mb-2">Fecha y Hora:</label>
    <input type="datetime-local" id="fechaHora" name="fecha" required value="{{ date('Y-m-d\TH:i') }}" class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
</div>
        <div class="mb-4">
            <label for="sintomas" class="block text-gray-700 font-medium mb-2">Síntomas:</label>
            <textarea id="sintomas" name="sintomas" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600"></textarea>
        </div>
        <div class="mb-4">
            <label for="registrante" class="block text-gray-700 font-medium mb-2">Registrante</label>
            <input placeholder="{{ Auth::user()->name }}" disabled   type="number" id="registrante" name="registranteNombre" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            <input value="{{ Auth::user()->id }}" hidden   type="number" id="registrante" name="registrante" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>
        <div class="mb-4">
            <label for="hospital" class="block text-gray-700 font-medium mb-2">Hospital:</label>
            <input placeholder="{{ Auth::user()->hospital()->first()->nombre }}" disabled type="number" id="hospital" name="hospitalNombre" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            <input value="{{ Auth::user()->hospital()->first()->id }}" hidden type="number" id="hospital" name="hospital" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>
        <button type="submit" class="w-full py-2 px-4 bg-blue-700 text-white rounded hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-600 focus:ring-opacity-50">Registrar Paciente</button>
    </form>
</div>

@if ($errors->any())
    <div class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@endsection
