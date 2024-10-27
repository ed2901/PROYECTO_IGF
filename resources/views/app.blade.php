<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Triage</title>
    @vite('resources/js/app.js') <!-- Asegúrate de que este archivo sea el correcto -->
</head>
<body>
    <div id="app" data-page="{{ json_encode($page) }}"></div>
</body>
</html>
