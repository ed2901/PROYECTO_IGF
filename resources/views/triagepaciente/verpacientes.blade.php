@extends('layouts.app')

@section('nav-home')
<a href="/triagepaciente/verpacientes" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Realizar Triage</a>
@endsection
@section('content')

<h2 class="text-2xl font-semibold text-center mb-6">Elige un paciente para realizar triage</h2>

   
    <body class="bg-gray-100 p-0">

    <div class="h-screen flex justify-center">

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-800 text-white">
                    <th class="py-3 px-4 text-left">Codigo</th>
                    <th class="py-3 px-4 text-left">Nombre</th>
                    <th class="py-3 px-4 text-left">Edad</th>
                    <th class="py-3 px-4 text-left">Fecha y Hora</th>
                    <th class="py-3 px-4 text-left">Sintomas</th>
                    <th class="py-3 px-4 text-left">Estado</th>
                    <th class="py-3 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes_reg_inicial as $pacientes)

                @if ($pacientes->estado === 'Registrado')
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4">{{ $pacientes->codigo }}</td>
                        <td class="py-3 px-4">{{ $pacientes->nombre }}</td>
                        <td class="py-3 px-4">{{ $pacientes->edad }}</td>
                        <td class="py-3 px-4">{{ $pacientes->fecha }}</td>
                        <td class="py-3 px-4">{{ $pacientes->sintomas }}</td>
                        <td class="py-3 px-4">{{ $pacientes->estado }}</td>

                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('paciente.triage', $pacientes->id) }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                Realizar triage
                            </a>
                            
                        </td>
                    </tr>

                @endif
                
                @endforeach
            </tbody>
        </table>
    </div>




</div>
    
    </body>
    

    

@endsection
