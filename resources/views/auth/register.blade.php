@extends('layouts.app')

@section('content')
<style>
    /* Estilos generales para el contenedor */
    body {
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center; /* Centrar verticalmente */
        justify-content: center; /* Centrar horizontalmente */
        height: 100vh; /* Altura total de la ventana */
        background-color: #f8f9fa; /* Color de fondo */
    }

    /* Estilos para el formulario */
    .form-container {
        width: 100%; /* Ancho completo */
        max-width: 800px; /* Aumentar ancho máximo */
        padding: 4rem; /* Aumentar espaciado interno */
        background-color: white; /* Color de fondo del formulario */
        border-radius: 8px; /* Bordes redondeados */
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Sombra sutil */
    }

    /* Estilo para el encabezado del formulario */
    .form-header {
        background-color: #007bff; /* Color de fondo del encabezado */
        color: white; /* Color del texto */
        font-weight: bold; /* Negrita */
        text-align: center; /* Centrado del texto */
        padding: 1rem; /* Espaciado interno */
        border-radius: 8px 8px 0 0; /* Bordes redondeados en la parte superior */
        font-size: 1.5rem; /* Aumentar tamaño de fuente del encabezado */
    }

    /* Estilos para etiquetas */
    label {
        font-weight: bold; /* Negrita para etiquetas */
    }

    /* Estilo para el botón */
    button {
        width: 100%; /* Botón ocupa el 100% del ancho */
        padding: 1rem; /* Aumentar espaciado interno */
        background-color: #28a745; /* Color de fondo del botón */
        color: white; /* Color del texto */
        border: none; /* Sin borde */
        border-radius: 4px; /* Bordes redondeados */
        font-size: 1.25rem; /* Aumentar tamaño de fuente del botón */
        cursor: pointer; /* Cursor en forma de puntero */
        transition: background-color 0.2s; /* Transición suave */
    }

    /* Efecto hover para el botón */
    button:hover {
        background-color: #218838; /* Color de fondo al pasar el mouse */
    }

    /* Estilo para mensajes de error */
    .invalid-feedback {
        display: block; /* Mostrar feedback de error */
        color: red; /* Color del texto de error */
        font-size: 0.875rem; /* Tamaño de fuente del error */
    }

    /* Estilo para los inputs */
    input {
        padding: 1rem; /* Aumentar espaciado interno */
        font-size: 1rem; /* Aumentar tamaño de fuente */
    }
</style>

<div class="form-container">
    <div class="form-header">{{ __('Register') }}</div>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-8"> <!-- Cambiar el ancho a 8 -->
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-8"> <!-- Cambiar el ancho a 8 -->
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-8"> <!-- Cambiar el ancho a 8 -->
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            <div class="col-md-8"> <!-- Cambiar el ancho a 8 -->
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-8 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
