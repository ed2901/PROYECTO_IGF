@extends('layouts.app')

@section('nav-home')
<a href="/triagepaciente/verpacientes" class="block py-2 px-3 text-white bg-blue-700 rounded hover:bg-blue-800 md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Ver Pacientes</a>
@endsection

@section('content')
<h2 class="text-2xl font-semibold text-center mb-6">Realizando triage de: {{ old('nombre', $paciente->nombre) }}</h2>



<section class="py-6 dark:bg-gray-100 dark:text-gray-900">
	<div class="grid max-w-6xl grid-cols-1 px-6 mx-auto lg:px-8 md:grid-cols-2 md:divide-x">

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


            <p class="text-center block text-gray-1000 font-bold mb-2 ">Informacion del paciente</p>

            <div class="mb-4">
                <label for="nombre" class="block text-gray-800 font-bold mb-2">Nombre:</label>
                <p class="text-gray-500 text-base">
                {{ old('nombre', $paciente->nombre) }}
                </p>
            
            </div>

            <div class="mb-4">
             <label for="genero" class="block text-gray-800 font-bold mb-2">Género:</label>

             <p class="text-gray-500 text-base">
             {{ old('genero', $paciente->genero) }}
            </p>
    
            </div>
            <div class="mb-4">
                <label for="edad" class="block text-gray-800 font-bold mb-2">Edad:</label>
                <p class="text-gray-500 text-base">
             {{ old('edad', $paciente->edad) }}
            </p>
            </div>

            <div class="mb-4">
                <label for="sintomas" class="block text-gray-700 font-bold mb-2">Sintomas:</label>
                <textarea id="sintomas" name="sintomas" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ old('sintomas', $paciente->sintomas) }}</textarea>
            </div>

            <div class="mb-4">
             <label for="genero" class="block text-gray-800 font-bold mb-2">Codigo de paciente:</label>

            <span class="bg-gray-100 text-gray text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-900 dark:text-white">{{ old('codigo', $paciente->codigo) }}</span>

            </div>
            <div class="mb-4">
                <label for="edad" class="block text-gray-800 font-bold mb-2">Estado:</label>
                <span class="bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ old('estado', $paciente->estado) }}</span>

            </div>

            
        

    </div>
    
</div>

		


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


        <form action="{{ route('paciente.hacertriage', $paciente->id) }}" method="POST">
            @csrf
            @method('PUT')

            <p class="text-center block text-gray-1000 font-bold mb-2 ">Registro de Signos Vitales</p>

            <input value="{{ $paciente->id }}" hidden id="paciente" name="paciente" required >

            <div class="mb-4">
                <label for="temperatura" class="block text-gray-700 font-medium mb-2">Temperatura (°C)</label>
                <input placeholder=""  type="number" id="temperatura" name="temperatura" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <div class="mb-4">
                <label for="antecedentes" class="block text-gray-700 font-medium mb-2">Antecedentes:</label>
                <textarea id="antecedentes" name="antecedentes" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>

            <div class="mb-4">
                <label for="frec_cardiaca" class="block text-gray-700 font-medium mb-2">Frecuencia Cardiaca (bpm)</label>
                <input placeholder=""  type="number" id="frec_cardiaca" name="frec_cardiaca" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <div class="mb-4">
                <label for="glicemia" class="block text-gray-700 font-medium mb-2">Glicemia (mg/dL)</label>
                <input placeholder=""  type="number" id="glicemia" name="glicemia" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            </div>

            <div class="mb-4">
                <label for="observaciones" class="block text-gray-700 font-medium mb-2">Observaciones:</label>
                <textarea id="observaciones" name="observaciones" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
            </div>

            <div class="mb-4">
                <label for="glasgow" class="block text-gray-700 font-medium mb-2">Escala de Glasgow:</label>
                <select id="glasgow" name="glasgow" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
                <option value="">Seleccione</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                </select>
            </div>
            

    </div>
    
</div>







</section>

<div class="bg-gray-100  flex items-center justify-center ">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-3xl">

    <div class="overflow-x-auto shadow-md rounded-lg">
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">Código</th>
                    <th class="py-3 px-6 text-left">Descripción</th>
                    <th class="py-3 px-6 text-left">Prioridad</th>
                    <th class="py-3 px-6 text-left">Tiempo de Atencion</th>
                    <th class="py-3 px-6 text-left">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($triages as $triage)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6">
                            <!-- Condicional para el color del pill -->
                            <span class="inline-block px-3 py-1 text-sm font-semibold rounded-full 
                            @if($triage->codigo == 'Rojo') bg-red-500 text-white 
                            @elseif($triage->codigo == 'Naranja') bg-orange-500 text-white 
                            @elseif($triage->codigo == 'Amarillo') bg-yellow-500 text-white 
                            @elseif($triage->codigo == 'Verde') bg-green-500 text-white 
                            @elseif($triage->codigo == 'Azul') bg-blue-500 text-white 
                            @endif">
                                {{ $triage->codigo }}
                            </span>
                        </td>
                        <td class="py-3 px-6">{{ $triage->descripcion }}</td>
                        <td class="py-3 px-6">{{ $triage->prioridad }}</td>
                        <td class="py-3 px-6">{{ $triage->tiempo }}</td>
                        <td class="py-3 px-6 flex space-x-2">

                        <button type="button" onclick="setTriageName('{{ $triage->codigo }}', '{{ $triage->id }}')" class="bg-gray-500 text-white py-1 px-3 rounded hover:bg-yellow-400 transition">Elegír</button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
    </div>
    
    <br>
    <div class="mb-4">
            <label for="hospital" class="block text-gray-700 font-medium mb-2">Triage escogido:</label>
            <input disabled id="triageNombre" name="triageNombre" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
            <input hidden  id="triage" name="triage" required >
        </div>

        <script>
            function setTriageName(triageNombre, triageId) {
                document.getElementById('triageNombre').value = triageNombre;
                document.getElementById('triage').value = triageId;

                
                console.log(triageNombre, triageId); 
            }
            
        </script>
   

        

            <br>
            <button type="submit" class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Asignar Triage</button>
            <br><br>
            <button href="/triagepaciente/verpacientes" class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancelar</button>
        

    </div>
    
</div>



</form>
@endsection
