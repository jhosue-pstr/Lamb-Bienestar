<!-- resources/views/livewire/crear-evento.blade.php -->

<div class="modal" x-show="isOpen">
    <div class="modal-content">
        <span wire:click="$set('isOpen', false)" class="close">&times;</span>
        <form wire:submit.prevent="store">
            <!-- Aquí van los campos de tu formulario -->
            <div>
                <label for="nombre">Nombre</label>
                <input type="text" wire:model="nombre" id="nombre" required>
            </div>
            <div>
                <label for="descripcion">Descripción</label>
                <input type="text" wire:model="descripcion" id="descripcion" required>
            </div>
            <!-- ...otros campos... -->
            <button type="submit">Guardar Evento</button>
        </form>
    </div>
</div>
