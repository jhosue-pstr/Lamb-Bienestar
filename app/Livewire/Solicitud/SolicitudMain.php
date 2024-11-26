<?php

namespace App\Livewire\Solicitud;

use App\Models\Solicitud;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class SolicitudMain extends Component

{

            public $selectedPlan;
            public $selectedCampus;
            public $selectedProgram;
            public $selectedSemestreBeca;
            public $estado;
            public $semestre;
            public $plan;


            public $showCreateForm = false; // Para mostrar u ocultar el formulario

            // Método para abrir el formulario con valores predeterminados
            public function toggleCreateForm()
            {
                $this->showCreateForm = true;
                $this->selectedPlan = '2024-2'; // Valor predeterminado para Plan
                $this->selectedCampus = 'juliaca'; // Valor predeterminado para Campus
                $this->selectedProgram = 'sistemas'; // Valor predeterminado para Programa
            }


            public $solicitudes; // Lista de solicitudes
            public $form; // Para manejar los datos del formulario
            public $isOpen = false; // Controla la visibilidad del formulario modal

            public function mount()
            {
                $this->solicitudes = Solicitud::all();
                $this->form = collect(); // Inicializa el formulario como una colección vacía
            }

            public function render()
            {
                return view('livewire.solicitud.solicitud-main');
            }
            public function create()
            {
                $this->isOpen = true; // Muestra el formulario modal
                $this->form = collect(); // Resetea el formulario
                $this->resetValidation(); // Resetea las validaciones
            }
            public function store()
            {
                $this->validate([
                    'form.nombre' => 'required|string|max:255',
                    'form.fecha_registro' => 'required|date',
                    'form.semestre' => 'required|string',
                    'form.plan' => 'required|string',
                    'form.estado' => 'required|in:pendiente,aprobado,rechazado',
                ]);

                $this->form['user_id'] = Auth::user()->id; // Agrega el usuario autenticado
                Solicitud::create($this->form->toArray()); // Crea la solicitud en la base de datos

                $this->isOpen = false; // Cierra el formulario modal
                $this->dispatchBrowserEvent('sweetalert', ['message' => 'Solicitud creada exitosamente']); // Muestra una alerta
                $this->solicitudes = Solicitud::all(); // Actualiza la lista de solicitudes
            }

            public function edit(Solicitud $solicitud)
            {
                $this->isOpen = true; // Muestra el formulario modal
                $this->form = collect($solicitud->toArray()); // Llena el formulario con los datos de la solicitud
            }

            public function destroy(Solicitud $solicitud)
            {
                $solicitud->delete(); // Elimina la solicitud
                $this->dispatchBrowserEvent('sweetalert', ['message' => 'Solicitud eliminada exitosamente']); // Muestra una alerta
                $this->solicitudes = Solicitud::all(); // Actualiza la lista de solicitudes
            }


            public function cancelCreateForm()
            {
                $this->showCreateForm = false;
            }

            public function redirectToBeca()
            {
                if ($this->selectedSemestreBeca === '2024-2') {
                    return redirect()->route('livewire.becas.beca-seleccion');
                } elseif ($this->selectedSemestreBeca === '2025-1') {
                    return redirect()->route('livewire.becas.beca-alimento');
                } else {
                    session()->flash('error', 'Seleccione un tipo de beca válido.');
                }
            }

            public function redirectToGestion($id)
{
    $solicitud = Solicitud::findOrFail($id); // Asegúrate de que el modelo exista
    $tipoBeca = $solicitud->tipo; // Obtén el tipo de beca de la solicitud

    // Redirige al componente con el parámetro tipoBeca
    return redirect()->to(route('gestion.solicitud', ['tipoBeca' => $tipoBeca]));
}






            public function aplicarFiltros()
            {
                // Filtra las solicitudes según los valores de los filtros
                $this->solicitudes = Solicitud::query()
                ->when($this->semestre, fn($query) => $query->where('semestre', $this->semestre)) // Cambia 'semestre' por 'plan_programa' si corresponde a la columna correcta
                ->when($this->plan, fn($query) => $query->where('plan', $this->plan)) // Cambia el nombre a 'nombre_programa'
                ->when($this->estado, fn($query) => $query->where('estado', $this->estado))
                ->get();
            }
}
