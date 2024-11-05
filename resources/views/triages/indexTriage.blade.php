@extends('layouts.app')

@section('nav-home')
    <a href="{{ route('triages.index') }}" class="block py-2 px-3 text-gray-700 hover:bg-gray-100">Lista de Triages</a>
@endsection

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4 text-gray-800">Lista de Triages</h1>

    @if(session('success'))
        <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('triages.create') }}" class="mb-4 inline-block bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500 transition">Crear Nuevo Triage</a>

    <div class="overflow-x-auto shadow-md rounded-lg">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Código</th>
                    <th class="py-3 px-6 text-left">Descripción</th>
                    <th class="py-3 px-6 text-left">Prioridad</th>
                    <th class="py-3 px-6 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($triages as $triage)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">{{ $triage->codigo }}</td>
                        <td class="py-3 px-6">{{ $triage->descripcion }}</td>
                        <td class="py-3 px-6">{{ $triage->prioridad }}</td>
                        <td class="py-3 px-6 flex space-x-2">
                            <a href="{{ route('triages.edit', $triage) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-400 transition">Editar</a>
                            <form action="{{ route('triages.destroy', $triage) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white py-1 px-3 rounded hover:bg-red-500 transition">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
