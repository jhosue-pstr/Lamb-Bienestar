<div class="min-h-screen bg-gray-100 py-10">
    <div class="container mx-auto px-6 mb-6">
        <h1 class="text-3xl font-extrabold text-gray-800 tracking-tight">Selecciona una Beca</h1>
        <p class="text-gray-600 mt-1">Elige el tipo de beca y revisa los requisitos.</p>
    </div>

    <div class="container mx-auto px-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($becas as $beca)
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex items-center justify-center">
                    <img src="{{ $beca['icono'] }}" alt="{{ $beca['nombre'] }}" class="w-16 h-16">
                </div>
                <h2 class="mt-4 text-lg font-bold text-gray-800">{{ $beca['nombre'] }}</h2>
                <p class="text-gray-600 mt-2">{{ $beca['descripcion'] }}</p>
                <ul class="mt-4 text-sm text-gray-700 list-disc list-inside">
                    @foreach ($beca['requisitos'] as $requisito)
                        <li>{{ $requisito }}</li>
                    @endforeach
                </ul>
                <button class="mt-4 bg-gradient-to-r from-green-400 to-blue-500 text-white px-4 py-2 rounded-lg shadow-md hover:scale-105 transform transition w-full">
                    Seleccionar
                </button>
            </div>
        @endforeach
    </div>
</div>
