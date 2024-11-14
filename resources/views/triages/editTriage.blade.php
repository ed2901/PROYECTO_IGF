@extends('layouts.app')

@section('nav-home')
    <a href="{{ route('triages.index') }}" class="block py-2 px-3 text-gray-700 hover:bg-gray-100">Lista de Triages</a>
@endsection

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4 text-gray-800">Editar Triage</h1>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <strong>Errores al enviar el formulario:</strong>
            <ul class="mt-2 list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('triages.update', $triage) }}" method="POST" class="bg-white shadow-md rounded-lg p-6">
        @csrf
        @method('PUT')

        <div class="form-group mb-4">
    <label for="codigo" class="block text-gray-700 font-medium mb-2">Código</label>
    <div class="relative">
        <div class="dropdown">
            <button id="dropdownColorButton" class="w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-lg text-left flex justify-between items-center focus:outline-none focus:border-blue-500">
                <span id="selectedColorText">{{ ucfirst($triage->codigo) ?: 'Selecciona un color' }}</span>
                <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </button>
            <div id="colorOptions" class="absolute w-full bg-white border border-gray-300 rounded-lg mt-1 hidden">
                <div class="flex flex-wrap">
                    <div class="color-option w-12 h-12 bg-red-500 m-1 cursor-pointer" onclick="setPriority(1)" data-color="Rojo"></div>
                    <div class="color-option w-12 h-12 bg-orange-500 m-1 cursor-pointer" onclick="setPriority(2)" data-color="Naranja"></div>
                    <div class="color-option w-12 h-12 bg-yellow-500 m-1 cursor-pointer" onclick="setPriority(3)" data-color="Amarillo"></div>
                    <div class="color-option w-12 h-12 bg-green-500 m-1 cursor-pointer" onclick="setPriority(4)" data-color="Verde"></div>
                    <div class="color-option w-12 h-12 bg-blue-500 m-1 cursor-pointer" onclick="setPriority(5)" data-color="Azul"></div>
                </div>
            </div>
        </div>

        <!-- Campo oculto para enviar el color seleccionado con el formulario -->
        <input type="hidden" id="codigo" name="codigo" value="{{ $triage->codigo }}">
    </div>
</div>

<script>
    // Inicializar la selección de color al cargar el formulario
    const selectedColor = "{{ $triage->codigo }}";
    if (selectedColor) {
        const colorText = document.getElementById('selectedColorText');
        colorText.textContent =selectedColor.charAt(0).toUpperCase() + selectedColor.slice(1);
    }

    // Mostrar u ocultar el dropdown al hacer clic en el botón
    document.getElementById('dropdownColorButton').addEventListener('click', function(event) {
        event.preventDefault(); // Previene que el formulario se envíe o la página se recargue
        const options = document.getElementById('colorOptions');
        options.classList.toggle('hidden');
    });

    // Cambiar el valor del color seleccionado y actualizar el texto en el botón
    const colorOptions = document.querySelectorAll('.color-option');
    colorOptions.forEach(option => {
        option.addEventListener('click', function() {
            const selectedColor = option.dataset.color;
            const colorText = document.getElementById('selectedColorText');
            const hiddenInput = document.getElementById('codigo');

            // Actualiza el texto y el valor del campo oculto
            colorText.textContent =selectedColor.charAt(0).toUpperCase() + selectedColor.slice(1);
            hiddenInput.value = selectedColor;

            // Cierra el dropdown
            document.getElementById('colorOptions').classList.add('hidden');
        });
    });
</script>


        <div class="form-group mb-4">
            <label for="descripcion" class="block text-gray-700 font-medium mb-2">Descripción</label>
            <input type="text" class="form-control border border-gray-300 rounded-lg w-full p-2 focus:outline-none focus:border-blue-500" id="descripcion" name="descripcion" value="{{ $triage->descripcion }}" required>
        </div>

        <div class="form-group mb-4">
    <label for="prioridad" class="block text-gray-700 font-medium mb-2">Prioridad</label>
    <input type="text" class="form-control border border-gray-300 rounded-lg w-full p-2 focus:outline-none focus:border-blue-500" id="prioridad" name="prioridad" value="{{ $triage->prioridad }}" required readonly>

</div>
<script>
        // Función que cambia el valor de prioridad según el color seleccionado
        function setPriority(prioridad) {
            // Actualiza el valor del campo de prioridad
            document.getElementById('prioridad').value = prioridad;
        }
    </script>


        <div class="form-group mb-4">
            <label for="tiempo" class="block text-gray-700 font-medium mb-2">Tiempo de atencion</label>
            <input type="text" class="form-control border border-gray-300 rounded-lg w-full p-2 focus:outline-none focus:border-blue-500" id="tiempo" name="tiempo" value="{{ $triage->tiempo }}" required>
        </div>

        <div class="flex space-x-2">
            <button type="submit" class="bg-blue-600 text-white py-2 px-4 rounded hover:bg-blue-500 transition">Actualizar Triage</button>
            <a href="{{ route('triages.index') }}" class="bg-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-200 transition">Cancelar</a>
        </div>
    </form>
</div>
@endsection
