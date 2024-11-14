@extends('layouts.app')

@section('nav-home')
<a href="/registrarhospital" class="block py-2 px-3 text-white bg-blue-700 rounded hover:bg-blue-800 md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Hospitales Registrados</a>
@endsection

@section('content')
<h2 class="text-2xl font-semibold text-center mb-6">Editando hospital: {{ old('nombre', $hospital->nombre) }}</h2>

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

        <form action="{{ route('hospital.update', $hospital->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="{{ old('nombre', $hospital->nombre) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="direccion" class="block text-gray-700 font-bold mb-2">Dirección:</label>
                <input type="text" id="direccion" name="direccion" value="{{ old('direccion', $hospital->direccion) }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                <textarea id="descripcion" name="descripcion" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('descripcion', $hospital->descripcion) }}</textarea>
            </div>

            <div class="mb-4">
                <label for="logo" class="block text-gray-700 font-bold mb-2">Logo:</label>
                @if ($hospital->logo)
                    <img src="{{ asset('storage/' . $hospital->logo) }}" alt="Logo de {{ $hospital->nombre }}" class="mb-2" style="max-width: 100px; max-height: 100px;">
                @endif
                <input type="file" id="logo" name="logo" accept="image/*" class="mt-2 mb-4">
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Actualizar</button>
        </form>

        <a href="/verhospitales" class="inline-block mt-4 text-blue-500 hover:underline">Volver a la lista de hospitales</a>
    </div>
</div>
@endsection
