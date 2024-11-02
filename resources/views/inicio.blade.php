<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Triage</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9f5ff;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }
        .container {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            padding: 40px;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }
        h1 {
            margin-bottom: 20px;
            font-size: 28px;
            color: #007bff;
        }
        p {
            margin-bottom: 30px;
            font-size: 18px;
            line-height: 1.6;
        }
        .auth-links {
            display: flex;
            justify-content: space-between;
            margin-top: 30px;
        }
        .btn {
            display: inline-block;
            padding: 15px 25px;
            background-color: #28a745;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
            font-size: 16px;
        }
        .btn:hover {
            background-color: #218838;
        }
        /* Añadiendo un estilo para móviles */
        @media (max-width: 600px) {
            .container {
                width: 90%;
            }
            h1 {
                font-size: 24px;
            }
            p {
                font-size: 16px;
            }
        }
        /* Estilo del logo */
        .logo {
            width: 150px; /* Tamaño del logo */
            margin-bottom: 20px; /* Espacio debajo del logo */
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/logo.png') }}" alt="Logo de Medicina" class="logo"> <!-- Cambia la ruta si es necesario -->
        <h1>Sistema de Triage Hospitalario</h1> <!-- Texto actualizado -->
        <p>Bienvenido al sistema de triage para hospitales públicos a nivel nacional.</p> <!-- Texto de bienvenida -->

        
        <div class="auth-links">
            <a href="{{ route('login') }}" class="btn">Iniciar sesión</a>
            <a href="/register" class="btn">Registrarse</a>
        </div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
