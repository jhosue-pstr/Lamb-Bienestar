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
                    <a id="boton" href="{{ route('crear-citas') }}" class="inline-block px-10 py-4 text-xl font-bold text-white bg-green-700 rounded hover:bg-green-800">
                        Agendar consulta
                    </a>
                </div>
                <div id="texto">

                </div>
            </div>
        </div>
    </div>











    <div id="mascota-container" class="absolute right-0 p-4 transform -translate-x-40" style="top: 748px; left: 1080px;">
        <!-- Imagen de la mascota -->
        <img src="/imagenes/mascota322.png" alt="Mascota" id="mascota" class="h-40 w-30 animate-move-left">

        <!-- Nube de pensamiento más grande -->
        <div id="mensaje-mascota" class="absolute hidden max-w-[200px] p-1 transform bg-green-400 rounded-lg shadow-lg -translate-x-2/3 -top-20 -left-3">
            <!-- Mensaje de texto más grande -->
            <p id="mensaje-texto" class="text-base font-bold text-black"></p>
            <!-- Triángulo más grande para la nube de pensamiento -->
            <div class="absolute w-0 h-0 border-transparent border-t-5 border-l-5 border-r-5 border-t-green-400 -bottom-2 left-20"></div>
        </div>
    </div>





    <script>
        // Contenidos para cada pestaña
        const secciones = [
            {
                imagen: "{{ asset('imagenes/consulta1.jpg') }}",
                texto: `
                    <h1 class="text-4xl font-bold text-red-700">Psicología</h1>
                    <p class="mt-5 text-2xl font-semibold">Descripción: La sección de Psicología de la UPEU se dedica a brindar apoyo integral a los estudiantes, personal docente y administrativo, promoviendo su bienestar mental y emocional. Los servicios incluyen:</p>
                    <ul class="pl-4 mt-8 ml-10 space-y-6 text-xl text-gray-800 list-disc">
                        <li>Evaluación psicológica y diagnóstico de trastornos emocionales y conductuales.</li>
                        <li>Terapias individuales y grupales enfocadas en el manejo del estrés, ansiedad y depresión.</li>
                        <li>Talleres sobre habilidades sociales, resolución de conflictos y manejo de emociones.</li>
                        <li>Consejería vocacional para apoyar a los estudiantes en la elección de su carrera profesional.</li>
                        <li>Programas de apoyo en situaciones de crisis, con un enfoque en la prevención del suicidio.</li>
                    </ul>
                `,
                boton: "/crear-citas"
            },

            {
                imagen: "{{ asset('imagenes/consulta2.jpg') }}",
                texto: `
                    <h1 class="text-4xl font-bold text-red-700">Centro Médico</h1>
                    <p class="mt-5 text-2xl font-semibold">Descripción: El Centro Médico de la UPEU está enfocado en garantizar la salud física de la comunidad universitaria a través de un enfoque preventivo y de atención primaria. Sus servicios abarcan:</p>
                    <ul class="pl-4 mt-8 ml-10 space-y-6 text-xl text-gray-800 list-disc">
                        <li>Consultas médicas generales para el diagnóstico y tratamiento de enfermedades comunes.</li>
                        <li>Controles médicos periódicos y campañas de despistaje de enfermedades como hipertensión y diabetes.</li>
                        <li>Servicios de laboratorio clínico para análisis de sangre, orina y otros estudios diagnósticos.</li>
                        <li>Programas de vacunación y control de infecciones para prevenir brotes en la comunidad universitaria.</li>
                        <li>Atención de urgencias menores y primeros auxilios para situaciones que requieren intervención inmediata.</li>
                    </ul>
                `,
                boton: "/crear-citas"
            },

            {
                imagen: "{{ asset('imagenes/consulta3.jpg') }}",
                texto: `
                    <h1 class="text-3xl font-bold text-red-700">Capellanía</h1>
                    <p class="mt-5 text-2xl font-semibold">Descripción: La Capellanía de la UPEU está comprometida en ofrecer un acompañamiento espiritual y moral a los estudiantes, personal y sus familias. Sus actividades incluyen:</p>
                    <ul class="pl-4 mt-8 ml-10 space-y-6 text-xl text-gray-800 list-disc">
                        <li>Consejería espiritual y apoyo emocional, con un enfoque en el fortalecimiento de la fe y los valores cristianos.</li>
                        <li>Organización de cultos, estudios bíblicos y programas de oración para la comunidad universitaria.</li>
                        <li>Asesoramiento en temas de vida familiar, relaciones interpersonales y resolución de conflictos desde una perspectiva cristiana.</li>
                        <li>Programas de servicio comunitario y voluntariado para fomentar el compromiso social.</li>
                        <li>Actividades de integración espiritual, como retiros y jornadas de reflexión.</li>
                    </ul>
                `,
                boton: "/crear-citas"
            },

            {
                imagen: "{{ asset('imagenes/consulta4.jpg') }}",
                texto: `
                    <h1 class="text-3xl font-bold text-red-700">Atención Médica</h1>
                    <p class="mt-5 text-2xl font-semibold">Descripción: El servicio de Atención Médica en la UPEU está orientado a ofrecer una respuesta rápida y eficiente a las necesidades de salud de la comunidad universitaria. Se enfoca en:</p>
                    <ul class="pl-4 mt-8 ml-10 space-y-6 text-xl text-gray-800 list-disc">
                        <li>Atención inmediata para emergencias menores como cortes, quemaduras y lesiones deportivas.</li>
                        <li>Evaluaciones médicas periódicas para el seguimiento del estado de salud de los estudiantes.</li>
                        <li>Servicios de odontología preventiva y tratamiento básico para asegurar una buena salud bucal.</li>
                        <li>Programas de educación para la salud, promoviendo hábitos saludables y la prevención de enfermedades.</li>
                        <li>Derivación a centros de salud especializados en casos que requieren atención avanzada.</li>
                    </ul>
                `,
                boton: "/crear-citas"
            },

            {
                imagen: "{{ asset('imagenes/consulta5.jpg') }}",
                texto: `
                    <h1 class="text-3xl font-bold text-red-700">Sostenibilidad Ambiental</h1>
                    <p class="mt-5 text-2xl font-semibold">Descripción: El área de Sostenibilidad Ambiental de la UPEU busca fomentar una cultura de respeto y cuidado del medio ambiente en toda la comunidad universitaria. Sus iniciativas incluyen:</p>
                    <ul class="pl-4 mt-8 ml-10 space-y-6 text-xl text-gray-800 list-disc">
                        <li>Programas de reciclaje y reducción de residuos dentro del campus universitario.</li>
                        <li>Talleres y charlas educativas sobre prácticas sostenibles, como el uso eficiente de recursos y la conservación de energía.</li>
                        <li>Campañas de arborización y mantenimiento de áreas verdes para un entorno saludable.</li>
                        <li>Proyectos de investigación en temas ambientales, en colaboración con estudiantes y docentes.</li>
                        <li>Promoción de hábitos ecológicos, como el uso de bicicletas y la reducción del uso de plásticos.</li>
                    </ul>
                `,
                boton: "/crear-citas"
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






























        async function addRecordatorio() {
            const data = {
                tipo: document.getElementById('eventType').value,
                nombre: document.getElementById('eventName').options[document.getElementById('eventName').selectedIndex].text,
                ubicacion: document.getElementById('eventLocation').value,
                fecha: document.getElementById('eventDate').value,
                hora: document.getElementById('eventTime').value,
                descripcion: document.getElementById('eventDescription').value
            };

            try {
                const response = await fetch('/recordatorio', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();
                if (result.success) {
                    alert('¡Recordatorio añadido correctamente!');
                }
            } catch (error) {
                console.error('Error al guardar el recordatorio:', error);
                alert('Ocurrió un error al guardar el recordatorio.');
            }
        }

        async function obtenerRecordatorio() {
            try {
                const response = await fetch('/api/recordatorio');
                const recordatorio = await response.json();

                if (recordatorio) {
                    const mensajeTexto = `Recordatorio:\n${recordatorio.nombre}\nFecha: ${recordatorio.fecha}\nHora: ${recordatorio.hora}`;
                    mostrarMensaje(mensajeTexto);
                }
            } catch (error) {
                console.error('Error al obtener el recordatorio:', error);
            }
        }

        function mostrarMensaje(mensaje) {
            const mensajeContainer = document.getElementById('mensaje-mascota');
            const mensajeTexto = document.getElementById('mensaje-texto');
            const mascota = document.getElementById('mascota');

            mensajeTexto.textContent = mensaje;
            mensajeContainer.classList.remove('hidden');

            mascota.classList.add('animate-pulse');
            mensajeContainer.classList.add('animate-bounce');

            setTimeout(() => {
                mensajeContainer.classList.add('hidden');
                mascota.classList.remove('animate-pulse');
                mensajeContainer.classList.remove('animate-bounce');
            }, 5000);
        }

        setInterval(obtenerRecordatorio, 5000);
    </script>
</x-app-layout>
