@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Iniciar Sesión</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" id="email" name="email" required autofocus>
            @error('email')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Iniciar Sesión</button>
    </form>
</div>
@endsection
