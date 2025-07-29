<div class="modal fade show d-block" tabindex="-1" role="dialog" aria-labelledby="categoryModalLabel"
    style="background: rgba(0,0,0,0.5);">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $category_id ? 'Editar Categoría' : 'Crear Categoría' }}</h5>
                <button type="button" class="btn-close" wire:click="closeModal"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="mb-3">
                        <label class="form-label">Nombre de categoría</label>
                        <input type="text" class="form-control" wire:model.defer="name"
                            placeholder="Ej. Instalación">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Servicio asociado</label>
                        <select class="form-select" wire:model.defer="service_id">
                            <option value="">Seleccione un servicio</option>
                            @foreach ($services as $srv)
                                <option value="{{ $srv->id }}">{{ $srv->name }}</option>
                            @endforeach
                        </select>
                        @error('service_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="description">Descripción</label>
                        <textarea wire:model.defer="description" class="form-control" rows="4"
                            placeholder="Descripción de la categoría..."></textarea>
                        @error('description')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" wire:click="closeModal">Cancelar</button>
                <button type="button" class="btn btn-primary" wire:click="store">
                    {{ $category_id ? 'Actualizar' : 'Guardar' }}
                </button>
            </div>
        </div>
    </div>
</div>
