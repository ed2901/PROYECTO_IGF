@extends('layouts.app')

@section('content')
<style>
    body {
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #e9ecef; /* Color de fondo suave */
        font-family: 'Arial', sans-serif; /* Tipografía clara */
    }

    .container {
        max-width: 600px; /* Aumento del ancho máximo de la tarjeta */
        margin: auto;
        padding: 2rem 3rem; /* Aumento del espaciado interno */
        background-color: #f8f9fa; /* Color de fondo de la tarjeta */
        border-radius: 10px; /* Bordes redondeados más marcados */
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1); /* Sombra más pronunciada */
    }

    .header {
        display: flex; /* Usar flexbox para alinear logo y texto */
        align-items: center; /* Centrar verticalmente */
        margin-bottom: 1.5rem; /* Espacio debajo del encabezado */
    }

    .logo {
        width: 50px; /* Tamaño reducido del logo */
        height: auto; /* Mantener la proporción */
        margin-right: 1rem; /* Espacio a la derecha del logo */
    }

    h2 {
        margin: 0; /* Sin margen superior ni inferior */
        font-size: 1.8rem; /* Aumento del tamaño de la fuente */
        color: #343a40;
    }

    .form-group {
        margin-bottom: 1.25rem; /* Espacio reducido */
        text-align: left; /* Alinear etiquetas a la izquierda */
    }

    label {
        display: block; /* Mostrar como bloque */
        margin-bottom: 0.5rem; /* Espacio debajo de las etiquetas */
        font-weight: bold; /* Negrita */
        color: #495057; /* Color de las etiquetas */
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
        width: 100%; /* Ancho completo */
        padding: 0.75rem; /* Espaciado interno aumentado */
        border: 1px solid #ced4da; /* Borde gris */
        border-radius: 4px; /* Bordes redondeados */
        font-size: 1rem; /* Tamaño de fuente */
        transition: border-color 0.2s; /* Transición suave */
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #80bdff; /* Color de borde al enfocar */
        outline: none; /* Sin borde de enfoque */
    }

    button {
        width: 100%; /* Botón ocupa el 100% del ancho */
        padding: 0.75rem; /* Espaciado interno aumentado */
        background-color: #007bff; /* Color de fondo del botón */
        color: white; /* Color del texto */
        border: none; /* Sin borde */
        border-radius: 4px; /* Bordes redondeados */
        font-size: 1rem; /* Tamaño de fuente del botón */
        cursor: pointer; /* Cursor en forma de puntero */
        transition: background-color 0.2s; /* Transición suave */
    }

    button:hover {
        background-color: #0056b3; /* Color de fondo al pasar el mouse */
    }

    .error {
        color: red; /* Color del texto de error */
        font-size: 0.875rem; /* Tamaño de fuente del error */
    }

    .reset-password-link {
        display: block; /* Mostrar como bloque */
        text-align: center; /* Centrar texto */
        margin-top: 1.5rem; /* Espacio superior */
        color: #007bff; /* Color del enlace */
        text-decoration: none; /* Sin subrayado */
    }

    .reset-password-link:hover {
        text-decoration: underline; /* Subrayar al pasar el mouse */
    }
</style>

<div class="container">
    <div class="header"> <!-- Sección del encabezado -->
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo"> <!-- Asegúrate de que la ruta sea correcta -->
        <h2>Registro</h2>
    </div>

    <form method="POST" action="/register">
        @csrf
        <div class="form-group">
            <label for="name">{{ __('Nombre') }}</label>
            <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">{{ __('Contraseña') }}</label>
            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>
            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
        </div>

        <div class="form-group">
    <label for="hospital">{{ __('Hospital') }}</label>
    <select id="hospital" name="hospital" required>
        <option value="0" selected disabled hidden >Seleccione un hospital</option>
        
        @foreach($hospitales as $hospital)
            <option value="{{ $hospital->id }}">{{ $hospital->nombre }}</option>
        @endforeach
    </select>
</div>

        <div class="form-group">
            <label for="password-confirm">{{ __('Tipo de Usuario') }}</label>
            <select id="roles" type="dropdown" name="roles" required >
                 
                 <option value="medico">Medico</option>
                <option value="recepcionista">Recepcionista</option>
            </select>
        </div>
        

        <button type="submit">{{ __('Registrarse') }}</button>
    </form>
    <a href="{{ route('login') }}" class="reset-password-link">¿Ya tienes una cuenta? Inicia sesión</a>
</div>
@endsection
