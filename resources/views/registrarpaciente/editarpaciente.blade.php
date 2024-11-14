@extends('layouts.app')

@section('nav-home')
<a href="/registrarhospital" class="block py-2 px-3 text-white bg-blue-700 rounded hover:bg-blue-800 md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Editar Paciente</a>
@endsection

@section('content')
<h2 class="text-2xl font-semibold text-center mb-6">Editando paciente: {{ old('nombre', $paciente->nombre) }}</h2>

<div class="bg-gray-100  flex items-center justify-center p-6">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md">
        @if ($errors->any())
            <div class="mb-4">
                <ul class="text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('paciente.update', $paciente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $paciente->nombre) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
    <label for="genero" class="block text-gray-700 font-bold mb-2">Género:</label>
    <select id="genero" name="genero" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        <option value="M" {{ old('genero', $paciente->genero) == 'M' ? 'selected' : '' }}>M</option>
        <option value="F" {{ old('genero', $paciente->genero) == 'F' ? 'selected' : '' }}>F</option>
    </select>
</div>
            <div class="mb-4">
                <label for="edad" class="block text-gray-700 font-bold mb-2">Edad:</label>
                <input type="number" id="edad" name="edad" value="{{ old('edad', $paciente->edad) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="sintomas" class="block text-gray-700 font-bold mb-2">Sintomas:</label>
                <textarea id="sintomas" name="sintomas" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('sintomas', $paciente->sintomas) }}</textarea>
            </div>

            <button type="submit" class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Actualizar</button>
            <br><br>
            <button href="/registrarpaciente/verpacientes" class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancelar</button>
        </form>

    </div>
    
</div>

@endsection
