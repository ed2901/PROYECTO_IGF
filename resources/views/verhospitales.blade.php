@extends('layouts.app')

@section('nav-home')
<a href="/registrarhospital" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Hospitales Registrados</a>
@endsection
@section('content')

<h2 class="text-2xl font-semibold text-center mb-6">Todos los hospitales registrados</h2>


<h1 class="text-3xl font-bold mb-6 text-center text-gray-800">Lista de Hospitales</h1>
   
    <body class="bg-gray-100 p-0">

    <div class="h-screen flex justify-center">

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="py-3 px-4 text-left">ID</th>
                    <th class="py-3 px-4 text-left">Nombre</th>
                    <th class="py-3 px-4 text-left">Dirección</th>
                    <th class="py-3 px-4 text-left">Descripción</th>
                    <th class="py-3 px-4 text-left">Logo</th>
                    <th class="py-3 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($hospitales as $hospital)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4">{{ $hospital->id }}</td>
                        <td class="py-3 px-4">{{ $hospital->nombre }}</td>
                        <td class="py-3 px-4">{{ $hospital->direccion }}</td>
                        <td class="py-3 px-4">{{ $hospital->descripcion }}</td>
                        <td class="py-3 px-4">
                            @if ($hospital->logo)
                                <img src="{{ Storage::url($hospital->logo) }}" alt="Logo de {{ $hospital->nombre }}" class="w-20 h-20 object-cover rounded-full">
                            @else
                                <span class="text-gray-500">No disponible</span>
                            @endif
                        </td>
                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('hospital.edit', $hospital->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                Editar
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>




</div>
    
    </body>
    

    

@endsection
