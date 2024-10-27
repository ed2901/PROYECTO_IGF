@extends('layouts.app')

@section('content')
<style>
    /* Estilos generales para el contenedor */
    .container {
        max-width: 400px;
        margin: auto;
        padding: 2rem;
        background-color: #f8f9fa;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    /* Estilo para el logo */
    .logo {
        width: 100px;
        height: auto;
        margin-bottom: 1rem;
    }

    /* Estilo para el título */
    h2 {
        margin-bottom: 1.5rem;
        font-size: 1.5rem;
        color: #343a40;
    }

    /* Estilos para el grupo de formularios */
    .form-group {
        margin-bottom: 1.5rem;
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: bold;
        color: #495057;
    }

    input[type="email"],
    input[type="password"] {
        width: 100%;
        padding: 0.5rem;
        border: 1px solid #ced4da;
        border-radius: 4px;
        font-size: 1rem;
        transition: border-color 0.2s;
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
        border-color: #80bdff;
        outline: none;
    }

    button {
        width: 100%;
        padding: 0.5rem;
        background-color: #007bff;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 1rem;
        cursor: pointer;
        transition: background-color 0.2s;
    }

    button:hover {
        background-color: #0056b3;
    }

    .error {
        color: red;
        font-size: 0.875rem;
    }

    .reset-password-link {
        display: block;
        text-align: center;
        margin-top: 1rem;
        color: #007bff;
        text-decoration: none;
    }

    .reset-password-link:hover {
        text-decoration: underline;
    }
</style>

<div class="container">
    <!-- Logo -->
    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">

    <h2>Iniciar Sesión</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" required autofocus>
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Iniciar Sesión</button>
    </form>
    <a href="{{ route('password.request') }}" class="reset-password-link">¿Olvidaste tu contraseña?</a>
</div>
@endsection
