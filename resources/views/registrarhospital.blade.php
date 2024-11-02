@extends('layouts.app')

@section('content')
<div class="max-w-md mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-semibold text-center mb-6">Registrar un Hospital</h2>

    <form action="{{ url('/registrarhospital') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre del hospital</label>
            <input type="text" name="nombre" id="nombre" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

   
        <div class="mb-4">
            <label for="direccion" class="block text-gray-700 font-medium mb-2">Direccion</label>
            <input type="text" name="direccion" id="direccion" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200" required>
            @error('location')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="descripcion" class="block text-gray-700 font-medium mb-2">Descripcion del Hospital</label>
            <textarea name="descripcion" id="descripcion" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200"></textarea>
            @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="logo" class="block text-gray-700 font-medium mb-2">Logo</label>
            <input type="file" name="logo" id="logo" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200">
            @error('logo')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Submit Button -->
        <div class="mt-6">
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg focus:outline-none focus:ring focus:ring-blue-300">
                Registrar Hospital
            </button>
        </div>
    </form>
</div>
@endsection
