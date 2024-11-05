@extends('layouts.app')

@section('nav-home')
<a href="/home" class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 md:dark:text-blue-500 dark:bg-blue-600 md:dark:bg-transparent" aria-current="page">Home</a>
@endsection

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full">
            <div class="bg-gray-100">
                @if(Auth::user()->rol === 'admin')
                    <div class="p-4">
                        <div class="flex items-center">
                            <img src="/images/logo.png" alt="Logo de Medicina" class="w-12 h-12 mr-2" />
                            <h2 class="text-xl font-semibold leading-tight">Sistema de Triage Hospitalario</h2>
                        </div>
                    </div>

                    <div class="p-4">
                        <h5>Bienvenido {{ Auth::user()->name }}, estás conectado al sistema de triage hospitalario.</h5>
                        Usuario: <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Administrador</span>
                        <p>Utiliza el sistema para realizar acciones administrativas.</p>
                    </div>

                @elseif(Auth::user()->rol === 'medico')
                    <div class="p-4">
                        <div class="flex items-center">
                            @if (Auth::user()->hospital()->first()->logo)
                                <img src="{{ Storage::url(Auth::user()->hospital()->first()->logo) }}" alt="Logo" class="w-20 h-20 object-cover rounded-full">
                            @else
                                <span class="text-gray-500">No disponible</span>
                            @endif
                            <h2 class="text-xl font-semibold leading-tight">‎  {{ Auth::user()->hospital()->first()->nombre }}</h2>
                        </div>
                    </div>

                    <div class="p-4">
                        <h5>Bienvenido {{ Auth::user()->name }}, estás conectado al sistema de triage hospitalario.</h5>
                        Usuario: <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Medico</span>
                        <p>Utiliza el sistema para realizar acciones de médico.</p>
                    </div>

                @elseif(Auth::user()->rol === 'recepcionista')
                    <div class="p-4">
                        <div class="flex items-center">
                            @if (Auth::user()->hospital()->first()->logo)
                                <img src="{{ Storage::url(Auth::user()->hospital()->first()->logo) }}" alt="Logo" class="w-20 h-20 object-cover rounded-full">
                            @else
                                <span class="text-gray-500">No disponible</span>
                            @endif
                            <h2 class="text-xl font-semibold leading-tight">‎  {{ Auth::user()->hospital()->first()->nombre }}</h2>
                        </div>
                    </div>

                    <div class="p-4">
                        <h5>Bienvenido {{ Auth::user()->name }}, estás conectado al sistema de triage hospitalario.</h5>
                        Usuario: <span class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">Recepcionista</span>
                        <p>Utiliza el sistema para realizar acciones de recepción.</p>
                    </div>
                @endif

                <div class="flex flex-wrap mt-4">
                    <!-- Opciones para el rol de administrador -->
                    @if(Auth::user()->rol === 'admin')
                    <div class="w-full md:w-1/3 p-2">
                        <div class="bg-white border-4 border-green-500 p-4 rounded-lg shadow-md">
                            <h3 class="font-bold text-gray-800">Registrar Hospital</h3>
                            <p class="text-gray-600">Registra los hospitales a utilizar en el sistema</p>
                            <a href="{{ url('/registrarhospital') }}" class="inline-block mt-2 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                                Registrar
                            </a>
                        </div>
                    </div>
                    <div class="w-full md:w-1/3 p-2">
                        <div class="bg-white border-4 border-yellow-500 p-4 rounded-lg shadow-md">
                            <h3 class="font-bold text-gray-800">Ver Hospitales Registrados</h3>
                            <p class="text-gray-600">Ver y editar los hospitales registrados en el sistema</p>
                            <a href="{{ url('/verhospitales') }}" class="inline-block mt-2 px-4 py-2 bg-yellow-500 text-white rounded hover:bg-green-600">
                                Entrar
                            </a>
                        </div>
                    </div>
                    @endif

                    @if(Auth::user()->rol === 'recepcionista')
                    <div class="w-full md:w-1/3 p-2">
                        <div class="bg-white border-4 border-red-500 p-4 rounded-lg shadow-md">
                            <h3 class="font-bold text-gray-800">Registrar Paciente</h3>
                            <p class="text-gray-600">Registra a los pacientes para realizar el triage</p>
                            <a href="{{ url('/registrarpaciente/regpaciente') }}" class="inline-block mt-2 px-4 py-2 bg-red-500 text-white rounded hover:bg-green-600">
                                Registrar
                            </a>
                        </div>
                    </div>

                    <div class="w-full md:w-1/3 p-2">
                        <div class="bg-white border-4 border-green-500 p-4 rounded-lg shadow-md">
                            <h3 class="font-bold text-gray-800">Ver Pacientes Registrados</h3>
                            <p class="text-gray-600">Ver y editar información de los pacientes registrados</p>
                            <a href="{{ url('/registrarpaciente/verpacientes') }}" class="inline-block mt-2 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                                Entrar
                            </a>
                        </div>
                    </div>
                    @endif

                    @if(Auth::user()->rol === 'medico')
                    <div class="w-full md:w-1/3 p-2">
                        <div class="bg-white border-4 border-red-500 p-4 rounded-lg shadow-md">
                            <h3 class="font-bold text-gray-800">Evaluar Pacientes</h3>
                            <p class="text-gray-600">Evalúa el nivel de urgencia de cada paciente</p>
                            <a href="{{ url('/reportes-pacientes') }}" class="inline-block mt-2 px-4 py-2 bg-red-500 text-white rounded hover:bg-blue-600">
                                Evaluar
                            </a>
                        </div>
                    </div>
                    @endif

                    <!-- Tarjeta para gestionar triages -->
                    <div class="w-full md:w-1/3 p-2">
                        <div class="bg-white border-4 border-blue-500 p-4 rounded-lg shadow-md">
                            <h3 class="font-bold text-gray-800">Gestionar Triage</h3>
                            <p class="text-gray-600">Consulta y gestiona los triages realizados</p>
                            <a href="{{ url('/triages') }}" class="inline-block mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-green-600">
                                Entrar
                            </a>
                        </div>
                    </div>

                    <!-- Opciones comunes para todos los usuarios -->
                    <div class="w-full md:w-1/3 p-2">
                        <div class="bg-white border-4 border-purple-500 p-4 rounded-lg shadow-md">
                            <h3 class="font-bold text-gray-800">Códigos de Triage</h3>
                            <p class="text-gray-600">Consulta y gestiona las reglas de asignación de triage</p>
                            <a href="{{ url('/codigos-triage') }}" class="inline-block mt-2 px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600">
                                Entrar
                            </a>
                        </div>
                    </div>

                    <div class="w-full md:w-1/3 p-2">
                        <div class="bg-white border-4 border-blue-500 p-4 rounded-lg shadow-md">
                            <h3 class="font-bold text-gray-800">Monitoreo en Tiempo Real</h3>
                            <p class="text-gray-600">Entra a la interfaz de monitoreo en tiempo real de pacientes</p>
                            <a href="{{ url('/configuracion') }}" class="inline-block mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                Entrar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
