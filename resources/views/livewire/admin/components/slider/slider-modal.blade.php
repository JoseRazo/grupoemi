<div class="modal fade show d-block" tabindex="-1" style="background: rgba(0,0,0,0.5);">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $slider_id ? 'Editar Slider' : 'Nuevo Slider' }}</h5>
                <button type="button" class="btn-close" wire:click="closeModal"></button>
            </div>

            <div class="modal-body">
                <form wire:submit.prevent="store">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Título</label>
                            <input type="text" class="form-control" wire:model.defer="title">
                            @error('title') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Subtítulo</label>
                            <input type="text" class="form-control" wire:model.defer="subtitle">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Botón 1 (Texto)</label>
                            <input type="text" class="form-control" wire:model.defer="button1_text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Botón 1 (Enlace)</label>
                            <input type="text" class="form-control" wire:model.defer="button1_href">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Botón 2 (Texto)</label>
                            <input type="text" class="form-control" wire:model.defer="button2_text">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Botón 2 (Enlace)</label>
                            <input type="text" class="form-control" wire:model.defer="button2_href">
                        </div>

                        <div class="col-md-6 mb-3">
                            <label>Categoría</label>
                            <select class="form-select" wire:model.defer="slider_category_id">
                                <option value="">Seleccione...</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('slider_category_id') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <div class="col-md-3 mb-3">
                            <label>Orden</label>
                            <input type="number" class="form-control" wire:model.defer="order">
                        </div>

                        <div class="col-md-3 mb-3 d-flex align-items-end">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" wire:model.defer="is_active">
                                <label class="form-check-label">Activo</label>
                            </div>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Imagen</label>
                            <input type="file" class="form-control" wire:model="image" accept="image/*">
                            @if ($image)
                                <img src="{{ $image->temporaryUrl() }}" class="mt-2" width="150">
                            @elseif($image_url)
                                <img src="{{ asset('storage/' . $image_url) }}" class="mt-2" width="150">
                            @endif
                            @error('image') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" wire:click="closeModal">Cancelar</button>
                <button class="btn btn-primary" wire:click="store">
                    {{ $slider_id ? 'Actualizar' : 'Guardar' }}
                </button>
            </div>
        </div>
    </div>
</div>
