<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Triage</title>

    <!-- Incluye los estilos CSS generados -->
    @vite(['resources/js/app.js', 'resources/sass/app.scss']) <!-- Asegúrate de que los archivos sean los correctos -->
</head>
<body>
    <div id="app" data-page="{{ json_encode($page) }}"></div>

    <!-- Scripts de Vite -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</body>
</html>
