@extends('layouts.app')

@section('nav-home')
<a href="/registrarhospital" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Realizar Triage</a>
@endsection



@section('content')



<h2 class="text-2xl font-semibold text-center mb-6">Elige un paciente para atender </h2>

   
    <body class="bg-gray-100 p-0">

    <div class="h-screen flex justify-center">

    <div class="overflow-x-auto">

    <div class="w-full md:w-xl p-7">
        
        <div class="bg-white border-4 border-red-500 p-4 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-red-800 text-center mb-6">Prioridad 1 - Rojo</h2>

        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-red-800 text-white">
                    <th class="py-3 px-4 text-left">Triage</th>
                    <th class="py-3 px-4 text-left">Nombre</th>
                    <th class="py-3 px-4 text-left">Codigo</th> 
                    <th class="py-3 px-4 text-left">Temperatura</th>
                    <th class="py-3 px-4 text-left">Sintomas</th>
                    <th class="py-3 px-4 text-left">Pulso</th>
                    <th class="py-3 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes_reg_inicial as $pacientes)
                @foreach ($paciente_triage as $triage)

                @if ($pacientes->estado === 'Asignado')

                    @if ($triage->paciente === $pacientes->id)

                    @if ($triage->triageRel()->first()->codigo === 'Rojo')  
                        
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4"><span class="bg-red-100 text-red-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">{{ $triage->triageRel()->first()->codigo }}</span></td>
                        <td class="py-3 px-4">{{ $pacientes->nombre }}</td>
                        <td class="py-3 px-4">{{ $pacientes->codigo }}</td>
                        <td class="py-3 px-4">{{ $triage->temperatura }}°C </td>
                        <td class="py-3 px-4">{{ $pacientes->sintomas }}</td>
                        <td class="py-3 px-4">{{ $triage->frec_cardiaca }} bpm</td>

                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('paciente.atender', $pacientes->id) }}" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                                Atender
                            </a>
                            
                        </td>
                    </tr>
                    @endif 
                    @endif
                @endif
                
                @endforeach
                @endforeach
            </tbody>
        </table>
        </div>


        <h2 class="mb-6"></h2>

        

        <div class="bg-white border-4 border-orange-500 p-4 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-orange-800 text-center mb-6">Prioridad 2 - Naranja</h2>

        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-orange-800 text-white">
                    <th class="py-3 px-4 text-left">Triage</th>
                    <th class="py-3 px-4 text-left">Nombre</th>
                    <th class="py-3 px-4 text-left">Codigo</th> 
                    <th class="py-3 px-4 text-left">Temperatura</th>
                    <th class="py-3 px-4 text-left">Sintomas</th>
                    <th class="py-3 px-4 text-left">Pulso</th>
                    <th class="py-3 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes_reg_inicial as $pacientes)
                @foreach ($paciente_triage as $triage)

                @if ($pacientes->estado === 'Asignado')

                    @if ($triage->paciente === $pacientes->id)

                    @if ($triage->triageRel()->first()->codigo === 'Naranja')  
                        
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4"><span class="bg-orange-100 text-orange-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-orange-900 dark:text-orange-300">{{ $triage->triageRel()->first()->codigo }}</span></td>
                        <td class="py-3 px-4">{{ $pacientes->nombre }}</td>
                        <td class="py-3 px-4">{{ $pacientes->codigo }}</td>
                        <td class="py-3 px-4">{{ $triage->temperatura }}°C </td>
                        <td class="py-3 px-4">{{ $pacientes->sintomas }}</td>
                        <td class="py-3 px-4">{{ $triage->frec_cardiaca }} bpm</td>

                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('paciente.atender', $pacientes->id) }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
                                Atender
                            </a>
                            
                        </td>
                    </tr>
                    @endif 
                    @endif
                @endif
                
                @endforeach
                @endforeach
            </tbody>
        </table>
        </div>


        <h2 class="mb-6"></h2>

        <div class="bg-white border-4 border-yellow-500 p-4 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-yellow-800 text-center mb-6">Prioridad 3 - Amarillo</h2>

        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-yellow-800 text-white">
                    <th class="py-3 px-4 text-left">Triage</th>
                    <th class="py-3 px-4 text-left">Nombre</th>
                    <th class="py-3 px-4 text-left">Codigo</th> 
                    <th class="py-3 px-4 text-left">Temperatura</th>
                    <th class="py-3 px-4 text-left">Sintomas</th>
                    <th class="py-3 px-4 text-left">Pulso</th>
                    <th class="py-3 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes_reg_inicial as $pacientes)
                @foreach ($paciente_triage as $triage)

                @if ($pacientes->estado === 'Asignado')

                    @if ($triage->paciente === $pacientes->id)

                    @if ($triage->triageRel()->first()->codigo === 'Amarillo')  
                        
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4"><span class="bg-yellow-100 text-yellow-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ $triage->triageRel()->first()->codigo }}</span></td>
                        <td class="py-3 px-4">{{ $pacientes->nombre }}</td>
                        <td class="py-3 px-4">{{ $pacientes->codigo }}</td>
                        <td class="py-3 px-4">{{ $triage->temperatura }}°C </td>
                        <td class="py-3 px-4">{{ $pacientes->sintomas }}</td>
                        <td class="py-3 px-4">{{ $triage->frec_cardiaca }} bpm</td>

                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('paciente.atender', $pacientes->id) }}" class="bg-orange-500 hover:bg-orange-600 text-white font-bold py-2 px-4 rounded">
                                Atender
                            </a>
                            
                        </td>
                    </tr>
                    @endif 
                    @endif
                @endif
                
                @endforeach
                @endforeach
            </tbody>
        </table>
        </div>

        <h2 class="mb-6"></h2>

        <div class="bg-white border-4 border-green-500 p-4 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold text-green-800 text-center mb-6">Prioridad 4 - Verde</h2>

        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-green-800 text-white">
                    <th class="py-3 px-4 text-left">Triage</th>
                    <th class="py-3 px-4 text-left">Nombre</th>
                    <th class="py-3 px-4 text-left">Codigo</th> 
                    <th class="py-3 px-4 text-left">Temperatura</th>
                    <th class="py-3 px-4 text-left">Sintomas</th>
                    <th class="py-3 px-4 text-left">Pulso</th>
                    <th class="py-3 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes_reg_inicial as $pacientes)
                @foreach ($paciente_triage as $triage)

                @if ($pacientes->estado === 'Asignado')

                    @if ($triage->paciente === $pacientes->id)

                    @if ($triage->triageRel()->first()->codigo === 'Verde')  
                        
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4"><span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $triage->triageRel()->first()->codigo }}</span></td>
                        <td class="py-3 px-4">{{ $pacientes->nombre }}</td>
                        <td class="py-3 px-4">{{ $pacientes->codigo }}</td>
                        <td class="py-3 px-4">{{ $triage->temperatura }}°C </td>
                        <td class="py-3 px-4">{{ $pacientes->sintomas }}</td>
                        <td class="py-3 px-4">{{ $triage->frec_cardiaca }} bpm</td>

                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('paciente.atender', $pacientes->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                                Atender
                            </a>
                            
                        </td>
                    </tr>
                    @endif 
                    @endif
                @endif
                
                @endforeach
                @endforeach
            </tbody>
        </table>
        </div>

        <h2 class="mb-6"></h2>

        <div class="bg-white border-4 border-blue-500 p-4 rounded-lg shadow-md">

        <h2 class="text-xl font-semibold text-blue-800 text-center mb-6">Prioridad 5 - Azul</h2>

        <table class="min-w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-blue-800 text-white">
                    <th class="py-3 px-4 text-left">Triage</th>
                    <th class="py-3 px-4 text-left">Nombre</th>
                    <th class="py-3 px-4 text-left">Codigo</th> 
                    <th class="py-3 px-4 text-left">Temperatura</th>
                    <th class="py-3 px-4 text-left">Sintomas</th>
                    <th class="py-3 px-4 text-left">Pulso</th>
                    <th class="py-3 px-4 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pacientes_reg_inicial as $pacientes)
                @foreach ($paciente_triage as $triage)

                @if ($pacientes->estado === 'Asignado')

                    @if ($triage->paciente === $pacientes->id)

                    @if ($triage->triageRel()->first()->codigo === 'Azul')  
                        
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-3 px-4"><span class="bg-blue-100 text-blue-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">{{ $triage->triageRel()->first()->codigo }}</span></td>
                        <td class="py-3 px-4">{{ $pacientes->nombre }}</td>
                        <td class="py-3 px-4">{{ $pacientes->codigo }}</td>
                        <td class="py-3 px-4">{{ $triage->temperatura }}°C </td>
                        <td class="py-3 px-4">{{ $pacientes->sintomas }}</td>
                        <td class="py-3 px-4">{{ $triage->frec_cardiaca }} bpm</td>

                        <td class="py-3 px-4 text-center">
                            <a href="{{ route('paciente.atender', $pacientes->id) }}" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                                Atender
                            </a>
                            
                        </td>
                    </tr>
                    @endif 
                    @endif
                @endif
                
                @endforeach
                @endforeach
            </tbody>
        </table>
        </div>


    </div>

    </div>
</div>
    </body>

@endsection




