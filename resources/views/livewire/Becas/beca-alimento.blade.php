<div class="p-8 flex justify-center">
    <div class="bg-gradient-to-r from-blue-500 to-indigo-600 shadow-xl rounded-xl max-w-md w-full">
        <!-- Encabezado de la tarjeta -->
        <div class="p-6 text-center">
            <h2 class="text-2xl font-extrabold text-white uppercase">Beca de Alimentos</h2>
            <p class="mt-2 text-gray-200 text-sm">
                Apoyamos a estudiantes en situación económica vulnerable para garantizar su alimentación durante el ciclo académico.
            </p>
        </div>

        <!-- Contenido: Requisitos -->
        <div class="bg-white rounded-b-xl p-6">
            <h3 class="text-lg font-semibold text-gray-800 mb-4 text-center">Requisitos</h3>
            <ul class="list-inside list-disc space-y-2 text-gray-700">
                <li>Ser estudiante matriculado en el período actual.</li>
                <li>No contar con otras becas similares.</li>
                <li>Presentar identificación oficial.</li>
                <li>Demostrar necesidad económica.</li>
                <li>Promedio académico mínimo de 8.0.</li>
                <li>Completar el formulario de ficha socioeconomica</li>
            </ul>

            <!-- Botón de acción -->
            <div class="mt-6 text-center">
                <button
                    class="w-full bg-gradient-to-r from-purple-500 to-pink-500 text-white py-3 px-6 rounded-lg font-semibold text-lg shadow-md transform transition-all hover:scale-105 focus:outline-none focus:ring-4 focus:ring-pink-300 focus:ring-opacity-50"
                    wire:click="selectBeca"
                >
                    Seleccionar Beca
                </button>
            </div>
        </div>
    </div>
</div>
