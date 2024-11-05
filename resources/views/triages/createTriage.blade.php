@extends('layouts.app')

@section('nav-home')
    <a href="{{ route('triages.index') }}" class="block py-2 px-3 text-gray-700 hover:bg-gray-100">Lista de Triages</a>
@endsection

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4 text-gray-800">Crear Nuevo Triage</h1>

    <form action="{{ route('triages.store') }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf

        <div class="form-group mb-4">
            <label for="codigo" class="block text-gray-700 font-medium mb-2">Código</label>
            <input type="text" class="form-control border border-gray-300 rounded-lg w-full p-2 focus:outline-none focus:border-blue-500" id="codigo" name="codigo" required>
        </div>

        <div class="form-group mb-4">
            <label for="descripcion" class="block text-gray-700 font-medium mb-2">Descripción</label>
            <input type="text" class="form-control border border-gray-300 rounded-lg w-full p-2 focus:outline-none focus:border-blue-500" id="descripcion" name="descripcion" required>
        </div>

        <div class="form-group mb-4">
            <label for="prioridad" class="block text-gray-700 font-medium mb-2">Prioridad</label>
            <input type="number" class="form-control border border-gray-300 rounded-lg w-full p-2 focus:outline-none focus:border-blue-500" id="prioridad" name="prioridad" required>
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-green-600 text-white py-2 px-4 rounded hover:bg-green-500 transition">Crear Triage</button>
            <a href="{{ route('triages.index') }}" class="bg-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-200 transition">Cancelar</a>
        </div>
    </form>
</div>
@endsection
