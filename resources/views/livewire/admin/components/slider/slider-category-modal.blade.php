<div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $slider_category_id ? 'Editar Categoría' : 'Nueva Categoría' }}</h5>
                <button type="button" class="btn-close" wire:click="closeModal"></button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="store">
                    <div class="mb-3">
                        <label>Nombre</label>
                        <input type="text" class="form-control" wire:model.defer="name">
                        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    <div class="mb-3">
                        <label>Descripción</label>
                        <textarea class="form-control" rows="4" wire:model.defer="description"></textarea>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" wire:click="closeModal">Cancelar</button>
                <button class="btn btn-primary" wire:click="store">
                    {{ $slider_category_id ? 'Actualizar' : 'Guardar' }}
                </button>
            </div>
        </div>
    </div>
</div>
