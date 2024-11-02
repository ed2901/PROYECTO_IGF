@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex justify-center">
        <div class="w-full">
            <div class="bg-gray-100">
                
                <div class=" p-4">
                    <div class="flex items-center">
                        <img src="/images/logo.png" alt="Logo de Medicina" class="w-12 h-12 mr-2" />
                        <h2 class="text-xl font-semibold leading-tight">Sistema de Triage Hospitalario</h2>
                    </div>
                </div>

                <div class="p-4">
                @if(Auth::user()->rol === 'admin')
                <h5>Bienvenido {{ Auth::user()->name }}, estás conectado al sistema de triage hospitalario.</h5>
                Usuario: <span class="bg-green-100 text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Administrador</span>
                
                <p>Utiliza el sistema para realizar acciones administrativas.</p>
                
                @endif

                @if(Auth::user()->rol === 'medico')
                <h5>Bienvenido {{ Auth::user()->name }}, estás conectado al sistema de triage hospitalario.</h5>
                <span class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Medico</span>
                
                <p>Utiliza el sistema para realizar acciones de medico</p>
                
                @endif

                @if(Auth::user()->rol === 'recepcionista')
                <h5>Bienvenido {{ Auth::user()->name }}, estás conectado al sistema de triage hospitalario.</h5>
                <span class="bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-purple-900 dark:text-purple-300">Recepcion</span>
                
                <p>Utiliza el sistema para realizar acciones de recepcion</p>
                
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
                        @endif

                        @if(Auth::user()->rol === 'recepcionista')
                        <div class="w-full md:w-1/3 p-2">
                            <div class="bg-white border-4 border-red-500 p-4 rounded-lg shadow-md">
                                <h3 class="font-bold text-gray-800">Registrar Paciente</h3>
                                <p class="text-gray-600">Registra al los pacientes para realizar el triage</p>
                                <a href="{{ url('/registrarhospital') }}" class="inline-block mt-2 px-4 py-2 bg-red-500 text-white rounded hover:bg-green-600">
                                    Registrar
                                </a>
                                
                            </div>
                        </div>
                        @endif

                        <!-- Opciones para todos los usuarios -->
                        <div class="w-full md:w-1/3 p-2">
                            <div class="bg-white border-4 border-green-500 p-4 rounded-lg shadow-md">
                                <h3 class="font-bold text-gray-800">Códigos de Triage</h3>
                                <p class="text-gray-600">Consulta y gestiona los códigos de triage.</p>
                                <a href="{{ url('/codigos-triage') }}" class="inline-block mt-2 px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600">
                                    Ver Códigos
                                </a>
                            </div>
                        </div>

                        <!-- Opciones adicionales según el rol -->
                        @if(Auth::user()->rol === 'medico')
                        <div class="w-full md:w-1/3 p-2">
                            <div class="bg-white border-4 border-blue-500 p-4 rounded-lg shadow-md">
                                <h3 class="font-bold text-gray-800">Reportes de Pacientes</h3>
                                <p class="text-gray-600">Accede a los reportes detallados de triage.</p>
                                <a href="{{ url('/reportes-pacientes') }}" class="inline-block mt-2 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                                    Ver Reportes
                                </a>
                            </div>
                        </div>
                        @endif

                        <!-- Opciones comunes para todos los usuarios -->
                        <div class="w-full md:w-1/3 p-2">
                            <div class="bg-white border-4 border-purple-500 p-4 rounded-lg shadow-md">
                                <h3 class=" font-bold text-gray-800">Configuración</h3>
                                <p class="text-gray-600">Ajusta la configuración del sistema.</p>
                                <a href="{{ url('/configuracion') }}" class="inline-block mt-2 px-4 py-2 bg-purple-500 text-white rounded hover:bg-purple-600">
                                    Ir a Configuración
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
