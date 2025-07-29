<div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="serviceModalLabel"
    style="background: rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $service_id ? 'Editar Servicio' : 'Crear Servicio' }}</h5>
                <button type="button" class="btn-close" wire:click="closeModal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del servicio</label>
                        <input type="text" class="form-control" wire:model.defer="name"
                            placeholder="Ej. Electricidad">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Descripción</label>
                        <textarea class="form-control" wire:model.defer="description" rows="3" placeholder="Opcional"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="image_url" class="form-label">Imagen</label>
                        <input type="file" class="form-control" wire:model="image_url" accept="image/*">
                        @error('image_url')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancelar</button>
                <button type="button" class="btn btn-primary" wire:click="store">
                    {{ $service_id ? 'Actualizar' : 'Guardar' }}
                </button>
            </div>
        </div>
    </div>
</div>
