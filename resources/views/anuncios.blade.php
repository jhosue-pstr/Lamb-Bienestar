<x-app-layout>

    @php $totalSlides = count($anuncios); @endphp
    <div x-data="{ activeSlide: 0, totalSlides: {{ $totalSlides }}, interval: null }" x-init="interval = setInterval(() => activeSlide = (activeSlide + 1) % totalSlides, 10000)"
        class="carousel-container relative max-w-5xl mx-auto my-10 overflow-hidden">

        <div class="carousel-slides relative flex transition-transform duration-700"
            :style="'transform: translateX(-' + activeSlide * 100 + '%)'" style="width: {{ $totalSlides * 100 }}%;">

            @foreach ($anuncios as $index => $anuncio)
                <a href="{{ route('mas-informacion2', ['id' => $anuncio->id]) }}"
                    class="carousel-slide flex items-center justify-center flex-shrink-0 w-full p-10">
                    <div class="w-1/2">
                        <img src="{{ asset($anuncio->afiche) }}" alt="Afiche del anuncio"
                            class="carousel-image rounded-lg shadow-lg h-96">
                    </div>
                    <div class="w-1/2 p-8 carousel-text">
                        <h2 class="mb-4 text-3xl font-bold">{{ $anuncio->nombre }}</h2>
                        <p class="mb-2 text-xl"><strong>Fecha:</strong> {{ $anuncio->fecha }}</p>
                        <p class="mb-2 text-xl"><strong>Hora:</strong> {{ $anuncio->hora }}</p>
                        <p class="mt-4 text-lg text-gray-700">{{ Str::limit($anuncio->descripcion, 100) }}</p>
                    </div>
                </a>
            @endforeach
        </div>


        <div class="carousel-pagination">
            <template x-for="i in Array.from({length: totalSlides}).keys()" :key="i">
                <button @click="activeSlide = i" :class="activeSlide === i ? 'active' : ''"
                    class="carousel-pagination-button"></button>
            </template>
        </div>
    </div>

    <div class="full-box tile-container" style="min-height: 100vh; overflow-y: auto;">
        @foreach ($anuncios as $anuncio)
            <a href="{{ route('mas-informacion2', ['id' => $anuncio->id]) }}" class="tile">
                <div class="tile-tittle">{{ $anuncio->nombre }}</div>
                <div class="tile-icon">
                    <img src="{{ asset($anuncio->afiche) }}" alt="{{ $anuncio->nombre }}" class="tile-img">
                    <p>{{ Str::limit($anuncio->descripcion, 50) }}</p>
                    <p>Fecha: {{ $anuncio->fecha }} | Hora: {{ $anuncio->hora }}</p>
                </div>
            </a>
        @endforeach
    </div>








</x-app-layout>

<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>


<script>
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
                const mensajeTexto =
                    `Recordatorio:\n${recordatorio.nombre}\nFecha: ${recordatorio.fecha}\nHora: ${recordatorio.hora}`;
                mostrarMensaje(mensajeTexto);
            }
        } catch (error) {
            console.error('Error al obtener el recordatorio:', error);
        }
    }

    let mensajes = [];
    let colores = [];
    let indiceMensaje = 0;

    async function obtenerRecordatorio() {
        try {
            const response = await fetch('/api/recordatorio');
            const recordatorio = await response.json();

            if (recordatorio) {
                mensajes.push(
                    `Recordatorio:\n${recordatorio.nombre}\nFecha: ${recordatorio.fecha}\nHora: ${recordatorio.hora}`
                );
                colores.push('bg-green-400');
            }
        } catch (error) {
            console.error('Error al obtener el recordatorio:', error);
        }
    }

    async function obtenerUltimaCita() {
        try {
            const response = await fetch('/api/ultima-cita');
            const cita = await response.json();

            if (cita) {
                mensajes.push(`Cita:\nÁrea: ${cita.area}\nFecha: ${cita.fecha}\nHora: ${cita.hora}`);
                colores.push('bg-blue-400'); // Celeste para citas
            }
        } catch (error) {
            console.error('Error al obtener la última cita:', error);
        }
    }

    function mostrarMensaje() {
        const mensajeContainer = document.getElementById('mensaje-mascota');
        const mensajeTexto = document.getElementById('mensaje-texto');
        const mascota = document.getElementById('mascota');

        if (mensajes.length > 0) {
            mensajeTexto.textContent = mensajes[indiceMensaje];

            mensajeContainer.className =
                `absolute max-w-[200px] p-1 transform rounded-lg shadow-lg -translate-x-2/3 -top-20 -left-3 ${colores[indiceMensaje]}`;

            mensajeContainer.classList.remove('hidden');

            mascota.classList.add('animate-pulse');
            mensajeContainer.classList.add('animate-bounce');

            setTimeout(() => {
                indiceMensaje = (indiceMensaje + 1) % mensajes.length;
                mostrarMensaje();
            }, 8000);
        }
    }

    async function iniciarCicloMensajes() {
        await obtenerRecordatorio();
        await obtenerUltimaCita();

        if (mensajes.length > 0) {
            mostrarMensaje();
        } else {
            console.warn('No hay mensajes para mostrar.');
        }
    }

    document.addEventListener('DOMContentLoaded', iniciarCicloMensajes);
</script>


<style>
    .carousel-container {
        width: 100%;
        overflow: hidden;
    }

    .carousel-slides {
        display: flex;
        transition: transform 0.7s ease-in-out;
    }

    .carousel-slide {
        flex-shrink: 0;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .carousel-image {
        object-fit: cover;
        width: 100%;
        max-width: 100%;
        height: 100%;
        border-radius: 8px;
    }

    .carousel-text {
        padding: 1rem;
        background-color: #f8f8f8;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Ajustar la posición de los botones y paginación */
    .carousel-button {
        background-color: rgba(0, 0, 0, 0.5);
        color: white;
        border-radius: 50%;
        padding: 10px;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        z-index: 10;
    }

    .carousel-button:hover {
        background-color: rgba(0, 0, 0, 0.7);
    }

    .carousel-pagination {
        position: absolute;
        bottom: 20px;
        left: 50%;
        transform: translateX(-50%);
        display: flex;
        gap: 8px;
    }

    .carousel-pagination-button {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: gray;
    }

    .carousel-pagination-button.active {
        background-color: green;
    }
</style>
