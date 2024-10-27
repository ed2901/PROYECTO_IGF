@extends('layouts.app')

@section('content')
<div class="container-fluid"> <!-- Usar container-fluid para que ocupe todo el ancho -->
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="bg-light"> <!-- Fondo claro para toda la página -->
                <div class="header bg-teal-200 p-4"> <!-- Cambia el color de fondo del encabezado aquí -->
                    <div class="d-flex align-items-center">
                        <img src="/images/logo.png" alt="Logo de Medicina" style="width: 50px; height: 50px; margin-right: 8px;" /> <!-- Tamaño ajustado -->
                        <h2 class="text-xl font-semibold leading-tight">Sistema de Triage Hospitalario</h2> <!-- Título actualizado -->
                    </div>
                </div>

                <div class="p-4">
                    <h5>{{ __('Estás conectado al sistema de triage hospitalario.') }}</h5>
                    <p>Utiliza el sistema para gestionar los casos de pacientes y asegurar una atención rápida y eficiente.</p>

                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div style="background-color: #ffffff; border: 4px solid #4CAF50; padding: 16px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);" class="overflow-hidden">
                                <h3 style="color: #333333;">Códigos de Triage</h3>
                                <p style="color: #666666;">Consulta y gestiona los códigos de triage.</p>
                                <a href="{{ url('/codigos-triage') }}" style="display: inline-block; padding: 8px 16px; background-color: #4CAF50; color: white; border-radius: 4px; text-decoration: none;">
                                    Ver Códigos
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div style="background-color: #ffffff; border: 4px solid #2196F3; padding: 16px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);" class="overflow-hidden">
                                <h3 style="color: #333333;">Reportes</h3>
                                <p style="color: #666666;">Genera y visualiza reportes de triage.</p>
                                <a href="{{ url('/reportes') }}" style="display: inline-block; padding: 8px 16px; background-color: #2196F3; color: white; border-radius: 4px; text-decoration: none;">
                                    Ver Reportes
                                </a>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div style="background-color: #ffffff; border: 4px solid #9C27B0; padding: 16px; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);" class="overflow-hidden">
                                <h3 style="color: #333333;">Configuración</h3>
                                <p style="color: #666666;">Ajusta la configuración del sistema.</p>
                                <a href="{{ url('/configuracion') }}" style="display: inline-block; padding: 8px 16px; background-color: #9C27B0; color: white; border-radius: 4px; text-decoration: none;">
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
