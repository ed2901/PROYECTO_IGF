@extends('layouts.app')

@section('nav-home')
<a href="/registrarhospital" class="block py-2 px-3 text-white bg-blue-700 rounded hover:bg-blue-800 md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Editar Paciente</a>
@endsection

@section('content')
<h2 class="text-2xl font-semibold text-center mb-6">Informacion de paciente: {{ old('nombre', $paciente->nombre) }}</h2>
<h2 class="text-2xl font-semibold text-center mb-6">Triage :  {{$paciente_triage->triageRel()->first()->codigo }}</h2>



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

            <span class="bg-gray-100 text-white text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-900 dark:text-white">{{ old('codigo', $paciente->codigo) }}</span>

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


        

            <p class="text-center block text-gray-1000 font-bold mb-2 ">Signos Vitales del paciente</p>

            <div class="mb-4">
                <label for="temperatura" class="block text-gray-700 font-medium mb-2">Temperatura (°C)</label>
                <p class="text-gray-500 text-base">


                   {{$paciente_triage->temperatura }} °C
                </p>

            </div>

            <div class="mb-4">
                <label for="antecedentes" class="block text-gray-700 font-medium mb-2">Antecedentes:</label>
                <p class="text-gray-500 text-base">
                {{$paciente_triage->antecedentes }}
                </p>
            </div>

            <div class="mb-4">
                <label for="frec_cardiaca" class="block text-gray-700 font-medium mb-2">Frecuencia Cardiaca (bpm)</label>
                <p class="text-gray-500 text-base">
                    {{$paciente_triage->frec_cardiaca }} bpm
                </p>

            </div>

            <div class="mb-4">
                <label for="glicemia" class="block text-gray-700 font-medium mb-2">Glicemia (mg/dL)</label>
                <p class="text-gray-500 text-base">
                    {{$paciente_triage->glicemia }} mg/dL                
                </p>

            </div>

            <div class="mb-4">
                <label for="observaciones" class="block text-gray-700 font-medium mb-2">Observaciones:</label>
                <textarea id="observaciones" name="observaciones" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{$paciente_triage->observaciones }}</textarea>
            </div>

            <div class="mb-4">
                <label for="glasgow" class="block text-gray-700 font-medium mb-2">Escala de Glasgow:</label>
                <p class="text-gray-500 text-base">
                    {{$paciente_triage->glasgow }}
                </p>
                
            </div>
            

    </div>
    
</div>







</section>

<div class="bg-gray-100  flex items-center justify-center ">
    <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-2xl">

    <div class="overflow-x-auto shadow-md rounded-lg">
    
    </div>
    
    
    <div class="mb-4">
            
    

            
        <a href="/monitoreo/verpacientes" class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Editar</a>            
        <br><br>
            <a href="/monitoreo/verpacientes" class="w-full bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Volver a la lista de pacientes</a>
        

    </div>
    
</div>




@endsection
