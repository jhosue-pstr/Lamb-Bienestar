<div class="min-h-screen bg-gray-100 py-10">
  <!-- Contenedor para el saludo y la barra -->
<div class="container mx-auto text-center py-10">
    <!-- Barra de progreso con efecto de corriente -->
    <div class="relative mb-6">
        <div class="w-full bg-gray-200 h-2 rounded-full overflow-hidden">
            <div id="progress-bar" class="bg-blue-500 h-2 rounded-full"></div>
        </div>
    </div>

    <!-- Saludo estático -->
    <h1 id="greeting" class="text-3xl font-bold text-gray-800">¡Bienvenido, Dan!
        <p>  Tus solicitudes</p>
        </h1>
</div>

<!-- Librería Lottie para efectos adicionales -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.9.6/lottie.min.js"></script>

<script>
    // Barra de progreso con corriente eléctrica
    let progress = 0;
    const progressBar = document.getElementById('progress-bar');
    let electricEffect = false;

    function animateProgressBar() {
        if (progress < 100) {
            progress += 1;
            progressBar.style.width = progress + '%';
            if (electricEffect) {
                progressBar.style.background = 'linear-gradient(to right, #00f0ff, #ff00ff, #00f0ff)';
                progressBar.style.animation = 'electricCurrent 1s linear infinite';
            }
            setTimeout(animateProgressBar, 50);
        }
    }

    // Barra de progreso animada y destellos
    window.onload = () => {
        animateProgressBar(); // Iniciar barra de progreso

        // Agregar destellos de felicidad al título
        setTimeout(() => {
            const greeting = document.getElementById('greeting');
            greeting.classList.add('text-yellow-600', 'animate-pulse'); // Destellos de felicidad
            electricEffect = true; // Activar efecto eléctrico en la barra
        }, 1000);
    };
</script>





    <div class="container mx-auto px-6 py-8 bg-white rounded-lg shadow-xl">
        @if (session()->has('message'))
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded-md mb-4">
                {{ session('message') }}
            </div>
        @endif

        <!-- Filtros y Botones -->
        <div class="flex items-center justify-between mb-6">
            <!-- Filtros -->
            <div class="flex flex-wrap gap-4 w-full sm:w-auto items-center">
                <!-- Selector de semestre -->
                <div class="w-full sm:w-auto" style="min-width: 200px;">
                    <label for="semestre" class="block text-sm font-medium text-gray-800">
                        Semestre
                        <i class="fas fa-layer-group ml-2 text-red-500"></i>
                    </label>
                    <select id="semestre" wire:model="semestre"
                        class="mt-1 px-4 py-3 min-w-60 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-blue-400 focus:border-blue-400 shadow-sm transition ease-in-out duration-200 appearance-none overflow-hidden text-ellipsis">
                        <option value="">Seleccionar</option>
                        <option value="Regular 2024-2">Regular 2024-2</option>
                    </select>
                </div>

                <!-- Selector de programa -->
                <div class="w-full sm:w-auto" style="min-width: 220px;">
                    <label for="programa" class="block text-sm font-medium text-gray-800">
                        PLan
                        <i class="fas fa-graduation-cap ml-2 text-teal-500"></i>
                    </label>
                    <select id="plan" wire:model="plan"
                        class="mt-1 px-4 py-3 min-w-72 border border-gray-300 rounded-lg bg-white focus:ring-2 focus:ring-blue-400 focus:border-blue-400 shadow-sm transition ease-in-out duration-200 appearance-none overflow-hidden text-ellipsis">
                        <option value="">Seleccionar</option>
                        <option value="EP Ingeniería de Sistemas">EP Ingeniería de Sistemas</option>
                    </select>
                </div>

                <!-- Selector de estado personalizado -->
                <div class="w-full sm:w-auto" x-data="{ open: false, selected: '', options: [
                        { value: 'pendiente', label: 'Pendiente', icon: 'fas fa-clock text-yellow-500' },
                        { value: 'aprobado', label: 'Aprobado', icon: 'fas fa-check-circle text-green-500' },
                        { value: 'rechazado', label: 'Rechazado', icon: 'fas fa-times-circle text-red-500' }
                    ] }" style="min-width: 220px;" x-init="$watch('selected', value => $wire.set('estado', value?.value))">
                    <label for="estado" class="block text-sm font-medium text-gray-800 mb-2">
                        Estado
                        <i class="fas fa-cogs ml-2 text-blue-500"></i>
                    </label>
                    <div class="relative">
                        <!-- Select Personalizado -->
                        <div @click="open = !open"
                            class="flex justify-between items-center px-4 py-3 border border-gray-300 rounded-lg bg-white shadow-sm cursor-pointer">
                            <div class="flex items-center">
                                <template x-if="selected">
                                    <i :class="selected.icon" class="mr-2"></i>
                                </template>
                                <span x-text="selected ? selected.label : 'Seleccionar'" class="text-gray-800"></span>
                            </div>
                            <i class="fas fa-chevron-down text-gray-500"></i>
                        </div>

                        <!-- Opciones -->
                        <div x-show="open" @click.outside="open = false"
                            class="absolute bg-white border border-gray-300 rounded-lg shadow-lg mt-1 w-full z-10">
                            <template x-for="option in options" :key="option.value">
                                <div @click="selected = option; open = false"
                                    class="flex items-center px-4 py-3 hover:bg-gray-100 cursor-pointer">
                                    <i :class="option.icon" class="mr-3"></i>
                                    <span x-text="option.label"></span>
                                </div>
                            </template>
                        </div>

                        <!-- Input Oculto -->
                        <input type="hidden" x-bind:value="selected.value" id="selected-value" name="estado" />
                    </div>
                </div>
            </div>

            <!-- Botones -->
            <div class="flex gap-4 items-center">
                <button wire:click="aplicarFiltros" class="mt-5 bg-gradient-to-r from-blue-500 to-indigo-500 text-white px-6 py-3 rounded-lg shadow-md hover:scale-105 transform transition ease-in-out duration-200">
                    Buscar
                </button>
                <button wire:click="toggleCreateForm"
                    class="mt-5 bg-gradient-to-r from-green-400 to-blue-500 text-white px-6 py-3 rounded-lg shadow-md hover:scale-105 transform transition ease-in-out duration-200">
                    Crear Solicitud
                </button>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">#</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Tipo de beca</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Fecha de Registro</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Semestre</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Plan</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Plan Progrma</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Estado</th>
                        <th class="px-6 py-3 text-left text-sm font-semibold uppercase">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white-100 divide-y divide-gray-200">
                    @foreach ($solicitudes as $solicitud)
                        <tr class="hover:bg-gray-100 transition">
                            <td class="px-6 py-4">{{ $solicitud->id }}</td>
                            <td class="font-semibold text-red-550 px-6 py-4">{{ $solicitud->tipo }}</td>
                            <td class="semibold text-red-500 px-6 py-4">
                                <i class="fas fa-calendar-alt mr-2"></i>
                                {{ $solicitud->created_at->format('Y-m-d') }}
                            </td>
                            <td class="px-6 py-4">{{ $solicitud->semestre }}</td>
                            <td class="px-6 py-4">{{ $solicitud->Plan }}</td>
                            <td class="px-6 py-4">{{ $solicitud->plan_programa }}</td>
                            <td class="px-6 py-4 flex items-center">
                                @php
                                    $estado = strtolower(trim($solicitud->estado));
                                @endphp
                                @if ($estado === 'pendiente')
                                    <i class="fas fa-clock text-yellow-500 mr-2"></i>
                                @elseif ($estado === 'aprobado')
                                    <i class="fas fa-check-circle text-green-500 mr-2"></i>
                                @elseif ($estado === 'rechazado')
                                    <i class="fas fa-times-circle text-red-500 mr-2"></i>
                                @else
                                    <i class="fas fa-question-circle text-gray-500 mr-2"></i>
                                @endif
                                {{ ucfirst($estado) }}
                            </td>

                            <td class="px-6 py-4">
                                <div class="flex justify-center items-center">
                                    <button wire:click="redirectToGestion({{ $solicitud->id }})"
                                        class="text-orange-500 hover:text-orange-700 transition">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @if ($showCreateForm)
            @include('livewire.solicitud.solicitud-create')
        @endif
    </div>
</div>
