@extends('layouts.app')

@section('nav-home')
    <a href="{{ route('triages.index') }}" class="block py-2 px-3 text-gray-700 hover:bg-gray-100">Lista de Triages</a>
@endsection

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4 text-gray-800">Crear Nuevo Triage</h1>

    <form action="{{ route('triages.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="codigo" class="block text-gray-700">Código:</label>
            <input type="text" id="codigo" name="codigo" class="w-full border border-gray-300 rounded p-2" required>
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700">Descripción:</label>
            <input type="text" id="descripcion" name="descripcion" class="w-full border border-gray-300 rounded p-2" required>
        </div>

        <div class="mb-4">
            <label for="prioridad" class="block text-gray-700">Prioridad:</label>
            <input type="number" id="prioridad" name="prioridad" class="w-full border border-gray-300 rounded p-2" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500 transition">Crear Triage</button>
    </form>
</div>
@endsection
