<x-app-layout>


    <!-- Sección dinámica -->





    <div class="flex-1">

        <div class="full-box page-header">
            <div class="flex justify-center mb-6 space-x-8 border-b">
                <button onclick="mostrarSeccion(0)"
                    class="pb-2 text-lg font-bold text-gray-600 tab-button hover:text-blue-700 focus:text-blue-700">Psicología</button>
                <button onclick="mostrarSeccion(1)"
                    class="pb-2 text-lg font-bold text-gray-600 tab-button hover:text-blue-700 focus:text-blue-700">Centro
                    Médico</button>
                <button onclick="mostrarSeccion(2)"
                    class="pb-2 text-lg font-bold text-gray-600 tab-button hover:text-blue-700 focus:text-blue-700">Capellanía</button>
                <button onclick="mostrarSeccion(3)"
                    class="pb-2 text-lg font-bold text-gray-600 tab-button hover:text-blue-700 focus:text-blue-700">Atención
                    Médica</button>
                <button onclick="mostrarSeccion(4)"
                    class="pb-2 text-lg font-bold text-gray-600 tab-button hover:text-blue-700 focus:text-blue-700">Sostenibilidad
                    Ambiental</button>
            </div>
            <div class="container-fluid">
                <div class="row">

                    <!-- Columna 1: Imagen del Evento -->
                    <div class="col-12 col-md-6">

                        <div class="container flex flex-col items-center gap-8 px-4 py-8 mx-auto">
                            <!-- Botones de pestañas -->

                            <div id="imagen-container" class="overflow-hidden bg-white rounded-lg shadow-lg"
                                style="width: 700px; height: 750px;">
                                <img id="imagen" src="{{ asset('imagenes/1731294409_evento2xd.jpeg') }}"
                                    alt="Imagen" class="object-cover w-full h-full">
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-md-6">
                        <div id="contenido" class="container flex flex-wrap justify-center gap-8">
                            <div id="texto-container"
                                class="flex flex-col justify-start p-8 bg-white rounded-lg shadow-lg"
                                style="width: 700px;">
                                <div class="mb-4 text-right">
                                    <a id="boton" href="{{ route('crear-citas') }}"
                                        class="inline-block px-10 py-4 text-xl font-bold text-white bg-green-700 rounded hover:bg-green-800">
                                        Agendar consulta
                                    </a>
                                </div>
                                <div id="texto">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>






    <div id="mascota-container" class="absolute right-0 p-4 transform -translate-x-40"
    style="top: 750px; left: 800px;">
    <!-- Imagen de la mascota -->
    <img src="/imagenes/mascota322.png" alt="Mascota" id="mascota" class="h-40 w-45 animate-move-left"   style="with:80px ;height:170px;">


    <!-- Nube de pensamiento más grande -->
    <div id="mensaje-mascota"
        class="absolute hidden bg-green-400 rounded-lg shadow-lg"
        style="z-index: 9999; top: -100px; left: 10px; width: 210px; padding: 10px;">
        <!-- Mensaje de texto -->
        <p id="mensaje-texto" class="text-xl font-bold text-black">¡Hola, soy tu asistente!</p>
        <!-- Triángulo para la nube -->
        <div
            class="absolute w-0 h-0 border-transparent border-t-[15px] border-l-[15px] border-r-[15px] border-t-green-400"
            style="bottom: -15px; left: 50%; transform: translateX(-50%);">
        </div>
    </div>
</div>
















    <script>
        // Contenidos para cada pestaña
        const secciones = [{
                imagen: "{{ asset('imagenes/consulta1.jpg') }}",
                texto: `
                    <h1 class="text-4xl font-bold text-red-700">Psicología</h1>
                    <p class="mt-5 text-2xl font-semibold font-bold text-black">Descripción: La sección de Psicología de la UPEU se dedica a brindar apoyo integral a los estudiantes, personal docente y administrativo, promoviendo su bienestar mental y emocional. Los servicios incluyen:</p>
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
                    <p class="mt-5 text-2xl font-semibold font-bold text-black">Descripción: El Centro Médico de la UPEU está enfocado en garantizar la salud física de la comunidad universitaria a través de un enfoque preventivo y de atención primaria. Sus servicios abarcan:</p>
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
                    <p class="mt-5 text-2xl font-semibold font-bold text-black">Descripción: La Capellanía de la UPEU está comprometida en ofrecer un acompañamiento espiritual y moral a los estudiantes, personal y sus familias. Sus actividades incluyen:</p>
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
                    <p class="mt-5 text-2xl font-semibold font-bold text-black">Descripción: El servicio de Atención Médica en la UPEU está orientado a ofrecer una respuesta rápida y eficiente a las necesidades de salud de la comunidad universitaria. Se enfoca en:</p>
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
                    <p class="mt-5 text-2xl font-semibold font-bold text-black">Descripción: El área de Sostenibilidad Ambiental de la UPEU busca fomentar una cultura de respeto y cuidado del medio ambiente en toda la comunidad universitaria. Sus iniciativas incluyen:</p>
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
        // Cambiar entre secciones
        function mostrarSeccion(indice) {
            const imagenEl = document.getElementById('imagen');
            const textoEl = document.getElementById('texto');
            const botonEl = document.getElementById('boton');

            if (secciones[indice]) {
                imagenEl.src = secciones[indice].imagen;
                textoEl.innerHTML = secciones[indice].texto;
                botonEl.href = secciones[indice].boton;

                // Cambiar estilo del botón activo
                const botones = document.querySelectorAll('.tab-button');
                botones.forEach((btn, i) => {
                    btn.classList.toggle('text-green-700', i === indice);
                });
            } else {
                console.error('Sección no encontrada:', indice);
            }
        }

        // Inicializar con la primera sección
        mostrarSeccion(0);

        // Agregar recordatorio
        async function addRecordatorio() {
            const data = {
                tipo: document.getElementById('eventType').value,
                nombre: document.getElementById('eventName').options[document.getElementById('eventName')
                    .selectedIndex].text,
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
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content')
                    },
                    body: JSON.stringify(data)
                });

                const result = await response.json();
                if (result.success) {
                    alert('¡Recordatorio añadido correctamente!');
                } else {
                    alert('No se pudo guardar el recordatorio.');
                }
            } catch (error) {
                console.error('Error al guardar el recordatorio:', error);
                alert('Ocurrió un error al guardar el recordatorio.');
            }
        }

        // Ciclo de mensajes
        async function iniciarCicloMensajes() {
            await obtenerRecordatorio();
            await obtenerUltimaCita();

            if (mensajes.length > 0) {
                mostrarMensaje();
            } else {
                const mensajeContainer = document.getElementById('mensaje-mascota');
                const mensajeTexto = document.getElementById('mensaje-texto');
                mensajeTexto.textContent = '¡No tienes recordatorios ni citas!';
                mensajeContainer.className = 'absolute max-w-[200px] p-1 transform rounded-lg shadow-lg bg-gray-300';
                mensajeContainer.classList.remove('hidden');
            }
        }

        document.addEventListener('DOMContentLoaded', iniciarCicloMensajes);









    let mensajes = [];
    let colores = []; // Almacena los colores para cada mensaje
    let indiceMensaje = 0; // Índice para alternar entre los mensajes

    // Función para obtener el último recordatorio
    async function obtenerRecordatorio() {
        try {
            const response = await fetch('/api/recordatorio'); // Endpoint para recordatorio
            const recordatorio = await response.json();

            if (recordatorio) {
                mensajes.push(
                    `Recordatorio: \n${recordatorio.nombre}\nFecha: ${recordatorio.fecha}\nHora: ${recordatorio.hora}`
                );
                colores.push('bg-green-400'); // Verde para recordatorios
            }
        } catch (error) {
            console.error('Error al obtener el recordatorio:', error);
        }
    }

    // Función para obtener la última cita
    async function obtenerUltimaCita() {
        try {
            const response = await fetch('/api/ultima-cita');
            const cita = await response.json();

            if (cita) {
                mensajes.push(`Cita:\nÁrea: ${cita.area}\nFecha: ${cita.fecha}\nHora: ${cita.hora}`);
                colores.push('bg-blue-400'); // Azul para citas
            }
        } catch (error) {
            console.error('Error al obtener la última cita:', error);
        }
    }

    // Función para mostrar los mensajes
    function mostrarMensaje() {
        if (mensajes.length > 0) {
            document.getElementById('mensaje-texto').textContent = mensajes[indiceMensaje];
            document.getElementById('mensaje-mascota').classList.remove(...colores);
            document.getElementById('mensaje-mascota').classList.add(colores[indiceMensaje]);
            indiceMensaje = (indiceMensaje + 1) % mensajes.length; // Ciclo entre mensajes
        }
    }

    // Función para mostrar el mensaje de la mascota
    function mostrarMascota() {
        document.getElementById("mensaje-mascota").classList.remove("hidden");
        setInterval(mostrarMensaje, 5000); // Cambiar mensaje cada 5 segundos
    }

    // Inicializar el proceso
    async function iniciar() {
        await obtenerRecordatorio();
        await obtenerUltimaCita();
        mostrarMascota();
    }

    // Iniciar el proceso cuando cargue la página
    window.onload = iniciar;



    </script>



</x-app-layout>

