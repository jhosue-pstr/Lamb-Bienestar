<x-app-layout>
    <div class="container flex flex-col items-center gap-8 px-4 py-8 mx-auto">
        <!-- Botones de pestañas -->
        <div class="flex justify-center mb-6 space-x-8 border-b">
            <button onclick="mostrarSeccion(0)" class="pb-2 text-lg font-bold text-gray-600 tab-button hover:text-blue-700 focus:text-blue-700">Psicología</button>
            <button onclick="mostrarSeccion(1)" class="pb-2 text-lg font-bold text-gray-600 tab-button hover:text-blue-700 focus:text-blue-700">Centro Médico</button>
            <button onclick="mostrarSeccion(2)" class="pb-2 text-lg font-bold text-gray-600 tab-button hover:text-blue-700 focus:text-blue-700">Capellanía</button>
            <button onclick="mostrarSeccion(3)" class="pb-2 text-lg font-bold text-gray-600 tab-button hover:text-blue-700 focus:text-blue-700">Atención Médica</button>
            <button onclick="mostrarSeccion(4)" class="pb-2 text-lg font-bold text-gray-600 tab-button hover:text-blue-700 focus:text-blue-700">Sostenibilidad Ambiental</button>
        </div>


        <!-- Sección dinámica -->
        <div id="contenido" class="container flex flex-wrap justify-center gap-8">

            <!-- Cuadro para la imagen -->
            <div id="imagen-container" class="overflow-hidden bg-white rounded-lg shadow-lg" style="width: 700px; height: 750px;">
                <img id="imagen" src="{{ asset('imagenes/1731294409_evento2xd.jpeg') }}" alt="Imagen" class="object-cover w-full h-full">
            </div>

            <!-- Cuadro para el contenido de texto -->
            <div id="texto-container" class="flex flex-col justify-start p-8 bg-white rounded-lg shadow-lg" style="width: 700px;">
                <div class="mb-4 text-right">
                    <a id="boton" href="/otra-pagina" class="px-6 py-4 font-bold text-white bg-green-700 rounded hover:bg-green-800">Agendar consulta</a>
                </div>
                <div id="texto">
                    <h1 class="text-4xl font-bold text-red-700">Donar Sangre</h1>
                    <p class="mt-2 text-lg">¡Es una decisión que da vida!</p>
                    <p class="mt-1 text-gray-700">21 de Mayo | 8:00 am - 12:00 pm</p>
                    <p class="text-gray-700">Lugar: Salón de Actos UPeU</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Contenidos para cada pestaña
        const secciones = [
            {
                imagen: "{{ asset('imagenes/consulta1.jpg') }}",
                texto: `
                    <h1 class="text-3xl font-bold text-red-700">Psicología</h1>
                    <p class="mt-4 text-lg">Descripción: La sección de Psicología de la UPEU se dedica a brindar apoyo integral a los estudiantes, personal docente y administrativo, promoviendo su bienestar mental y emocional. Los servicios incluyen:</p>
                    <ul class="pl-4 mt-6 ml-10 space-y-4 text-gray-700 list-disc">
                        <li>Evaluación psicológica y diagnóstico de trastornos emocionales y conductuales.</li>
                        <li>Terapias individuales y grupales enfocadas en el manejo del estrés, ansiedad y depresión.</li>
                        <li>Talleres sobre habilidades sociales, resolución de conflictos y manejo de emociones.</li>
                        <li>Consejería vocacional para apoyar a los estudiantes en la elección de su carrera profesional.</li>
                        <li>Programas de apoyo en situaciones de crisis, con un enfoque en la prevención del suicidio.</li>
                    </ul>
                    <p class="mt-6 text-lg">Descripción: La sección de Psicología de la UPEU se dedica a brindar apoyo integral a los estudiantes, personal docente y administrativo, promoviendo su bienestar mental y emocional. Los servicios incluyen:</p>
                `,
                boton: "/crear-cita"
            },

            {
                imagen: "{{ asset('imagenes/consulta2.jpg') }}",
                texto: `
                    <h1 class="text-3xl font-bold text-red-700">Centro Médico</h1>
                    <p class="mt-4 text-lg">Descripción: El Centro Médico de la UPEU está enfocado en garantizar la salud física de la comunidad universitaria a través de un enfoque preventivo y de atención primaria. Sus servicios abarcan:</p>
                    <ul class="pl-4 mt-6 ml-10 space-y-4 text-gray-700 list-disc">
                        <li>Consultas médicas generales para el diagnóstico y tratamiento de enfermedades comunes.</li>
                        <li>Controles médicos periódicos y campañas de despistaje de enfermedades como hipertensión y diabetes.</li>
                        <li>Servicios de laboratorio clínico para análisis de sangre, orina y otros estudios diagnósticos.</li>
                        <li>Programas de vacunación y control de infecciones para prevenir brotes en la comunidad universitaria.</li>
                        <li>Atención de urgencias menores y primeros auxilios para situaciones que requieren intervención inmediata.</li>
                    </ul>
                    <p class="mt-4 text-lg">Descripción: El Centro Médico de la UPEU está enfocado en garantizar la salud física de la comunidad universitaria a través de un enfoque preventivo y de atención primaria. Sus servicios abarcan:</p>
                `,
                boton: "/crear-cita"
            },

            {
                imagen: "{{ asset('imagenes/consulta3.jpg') }}",
                texto: `
                    <h1 class="text-3xl font-bold text-red-700">Capellanía</h1>
                    <p class="mt-4 text-lg">Descripción: La Capellanía de la UPEU está comprometida en ofrecer un acompañamiento espiritual y moral a los estudiantes, personal y sus familias. Sus actividades incluyen:</p>
                    <ul class="pl-4 mt-6 ml-10 space-y-4 text-gray-700 list-disc">
                        <li>Consejería espiritual y apoyo emocional, con un enfoque en el fortalecimiento de la fe y los valores cristianos.</li>
                        <li>Organización de cultos, estudios bíblicos y programas de oración para la comunidad universitaria.</li>
                        <li>Asesoramiento en temas de vida familiar, relaciones interpersonales y resolución de conflictos desde una perspectiva cristiana.</li>
                        <li>Programas de servicio comunitario y voluntariado para fomentar el compromiso social.</li>
                        <li>Actividades de integración espiritual, como retiros y jornadas de reflexión.</li>
                    </ul>
                    <p class="mt-4 text-lg">Descripción: La Capellanía de la UPEU está comprometida en ofrecer un acompañamiento espiritual y moral a los estudiantes, personal y sus familias. Sus actividades incluyen:</p>
                `,
                boton: "/crear-cita"
            },

            {
                imagen: "{{ asset('imagenes/consulta4.jpg') }}",
                texto: `
                    <h1 class="text-3xl font-bold text-red-700">Atención Médica</h1>
                    <p class="mt-4 text-lg">Descripción: El servicio de Atención Médica en la UPEU está orientado a ofrecer una respuesta rápida y eficiente a las necesidades de salud de la comunidad universitaria. Se enfoca en:</p>
                    <ul class="pl-4 mt-6 ml-10 space-y-4 text-gray-700 list-disc">
                        <li>Atención inmediata para emergencias menores como cortes, quemaduras y lesiones deportivas.</li>
                        <li>Evaluaciones médicas periódicas para el seguimiento del estado de salud de los estudiantes.</li>
                        <li>Servicios de odontología preventiva y tratamiento básico para asegurar una buena salud bucal.</li>
                        <li>Programas de educación para la salud, promoviendo hábitos saludables y la prevención de enfermedades.</li>
                        <li>Derivación a centros de salud especializados en casos que requieren atención avanzada.</li>
                    </ul>
                    <p class="mt-4 text-lg">Descripción: El servicio de Atención Médica en la UPEU está orientado a ofrecer una respuesta rápida y eficiente a las necesidades de salud de la comunidad universitaria. Se enfoca en:</p>
                `,
                boton: "/crear-cita"
            },

            {
                imagen: "{{ asset('imagenes/consulta5.jpg') }}",
                texto: `
                    <h1 class="text-3xl font-bold text-red-700">Sostenibilidad Ambiental</h1>
                    <p class="mt-4 text-lg">Descripción: El área de Sostenibilidad Ambiental de la UPEU busca fomentar una cultura de respeto y cuidado del medio ambiente en toda la comunidad universitaria. Sus iniciativas incluyen:</p>
                    <ul class="pl-4 mt-6 ml-10 space-y-4 text-gray-700 list-disc">
                        <li>Programas de reciclaje y reducción de residuos dentro del campus universitario.</li>
                        <li>Talleres y charlas educativas sobre prácticas sostenibles, como el uso eficiente de recursos y la conservación de energía.</li>
                        <li>Campañas de arborización y mantenimiento de áreas verdes para un entorno saludable.</li>
                        <li>Proyectos de investigación en temas ambientales, en colaboración con estudiantes y docentes.</li>
                        <li>Promoción de hábitos ecológicos, como el uso de bicicletas y la reducción del uso de plásticos.</li>
                    </ul>
                    <p class="mt-4 text-lg">Descripción: El área de Sostenibilidad Ambiental de la UPEU busca fomentar una cultura de respeto y cuidado del medio ambiente en toda la comunidad universitaria. Sus iniciativas incluyen:</p>
                `,
                boton: "/crear-cita"
            }
        ];

        // Función para cambiar la sección
        function mostrarSeccion(indice) {
            const imagenEl = document.getElementById('imagen');
            const textoEl = document.getElementById('texto');
            const botonEl = document.getElementById('boton');

            imagenEl.src = secciones[indice].imagen;
            textoEl.innerHTML = secciones[indice].texto;
            botonEl.href = secciones[indice].boton;

            // Cambiar estilo del botón activo
            const botones = document.querySelectorAll('.tab-button');
            botones.forEach((btn, i) => {
                btn.classList.toggle('text-green-700', i === indice);
            });
        }

        // Inicializar con la primera sección
        mostrarSeccion(0);
    </script>
</x-app-layout>
