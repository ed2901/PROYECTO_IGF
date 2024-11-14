@extends('layouts.app')

@section('nav-home')
<a href="/registrarhospital" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Pacientes en espera</a>
@endsection
@section('content')

<h2 class="text-2xl font-semibold text-center mb-6">Monitoreo en tiempo real</h2>


<h1 class="text-3xl font-bold mb-6 text-center text-gray-800">en: {{ Auth::user()->hospital()->first()->nombre }} </h1>
   
    <body class="bg-gray-100 p-0">

    <div class=" flex justify-center">
    <div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Estadísticas de Pacientes por Triage</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <!-- Tarjeta de Pacientes Asignados -->
        <div class="bg-blue-100 p-4 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-blue-800">Pacientes Asignados</h2>
            <p class="text-4xl font-bold text-blue-600">{{ $pacientes_asignados }}</p>
        </div>

        <!-- Tarjeta de Pacientes Atendidos -->
        <div class="bg-green-100 p-4 rounded-lg shadow">
            <h2 class="text-xl font-semibold text-green-800">Pacientes Atendidos</h2>
            <p class="text-4xl font-bold text-green-600">{{ $pacientes_atendidos }}</p>
        </div>
    </div>

    <div class="bg-white shadow rounded-lg p-4">
        <canvas id="triageChart" class="w-full h-96"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('triageChart').getContext('2d');
        const triageData = {
            labels: @json(array_keys($estadisticas_triage)),
            datasets: [{
                label: 'Número de Pacientes',
                data: @json(array_values($estadisticas_triage)),
                backgroundColor: [
                    '#FF0000', // Rojo
                    '#FFA500', // Naranja
                    '#FFFF00', // Amarillo
                    '#00FF00', // Verde
                    '#0000FF'  // Azul
                ],
                borderColor: '#ddd',
                borderWidth: 1
            }]
        };

        new Chart(ctx, {
            type: 'bar',
            data: triageData,
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</div>

       
        
        

    </div>

    
    

    </body>

    <body class="bg-gray-100 p-0">
    <h2 class="text-xl font-semibold text-center mb-6">Pacientes con triage asignado</h2>


<div class="h-screen flex justify-center">

<div class="">
    <table class="min-w-full bg-white shadow-md rounded-lg">
        <thead>
            <tr class="bg-gray-800 text-white">
                <th class="py-3 px-4 text-left">Codigo</th>
                <th class="py-3 px-4 text-left">Nombre</th>
                <th class="py-3 px-4 text-left">Edad</th>
                <th class="py-3 px-4 text-left">Fecha y Hora</th>
                <th class="py-3 px-4 text-left">Sintomas</th>
                <th class="py-3 px-4 text-left">Estado</th>
                <th class="py-3 px-4 text-left">Triage</th>
                <th class="py-3 px-4 text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pacientes_reg_inicial as $pacientes)
                @foreach ($paciente_triage as $triage)
                @if ($triage->paciente === $pacientes->id)
                <tr class="border-b hover:bg-gray-100">
                    <td class="py-3 px-4">{{ $pacientes->codigo }}</td>
                    <td class="py-3 px-4">{{ $pacientes->nombre }}</td>
                    <td class="py-3 px-4">{{ $pacientes->edad }}</td>
                    <td class="py-3 px-4">{{ $pacientes->fecha }}</td>
                    <td class="py-3 px-4">{{ $pacientes->sintomas }}</td>
                    <td class="py-3 px-4">{{ $pacientes->estado }}</td>
                    <td class="py-3 px-4">
                    {{ $triage->triageRel()->first()->codigo }}
                    </td>

                    <td class="py-3 px-4 text-center">
                        <a href="{{ route('paciente.info', $pacientes->id) }}" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded">
                            Ver
                        </a>
                        
                    </td>
                </tr>
                @endif
                @endforeach
            @endforeach
        </tbody>
    </table>
</div>

</div>


</body>

   
    

    

@endsection
