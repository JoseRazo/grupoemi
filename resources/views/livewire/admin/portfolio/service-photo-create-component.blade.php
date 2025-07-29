<div>
    <div class="page-header">
        <h3 class="fw-bold mb-3">Agregar Foto</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">Portafolio</li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.portfolio.service-photos.index') }}">Fotos</a>
            </li>
            <li class="separator">
                <i class="icon-arrow-right"></i>
            </li>
            <li class="nav-item">Agregar Foto</li>
        </ul>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <form wire:submit.prevent="save">
                <div class="card">
                    <div class="card-header">
                        <h4>Agregar Foto</h4>
                    </div>
                    <div class="card-body">
                        <div class="my-2">
                            @include('back.auth.layouts.messages')
                        </div>
                        <p class="text-muted mb-4">
                            Complete el formulario a continuación para agregar una nueva foto al portafolio.
                        </p>

                        <div class="mb-3">
                            <label for="service" class="form-label">Servicio</label>
                            <select id="service" class="form-select" wire:model="service_id">
                                <option value="">Seleccione un servicio</option>
                                @foreach ($services as $service)
                                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                                @endforeach
                            </select>
                            @error('service_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="service_category_id" class="form-label">Categoría</label>
                            <select id="service_category_id" class="form-select" wire:model="service_category_id">
                                <option value="">Seleccione una categoría</option>
                            </select>
                            @error('service_category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Sincronizamos los datos con Livewire -->
                        <input type="hidden" id="hidden_service_id" wire:model.defer="service_id">
                        <input type="hidden" id="hidden_category_id" wire:model.defer="service_category_id">

                        <div class="mb-3">
                            <label for="caption" class="form-label">Descripción (opcional)</label>
                            <textarea wire:model="caption" id="caption" class="form-control" rows="3"></textarea>
                            @error('caption')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen</label>
                            <input type="file" wire:model="image" id="image" class="form-control">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        @if ($image)
                            <div class="mt-3">
                                <p class="fw-bold">Vista previa:</p>
                                <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded shadow"
                                    style="max-height: 120px;">
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="mt-4 d-flex gap-2">
                            <a href="{{ route('admin.portfolio.service-photos.index') }}"
                                class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Guardar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const serviceSelect = document.getElementById('service');
            const categorySelect = document.getElementById('service_category_id');

            serviceSelect.addEventListener('change', function() {
                const serviceId = this.value;

                // Limpiar categorías
                categorySelect.innerHTML = '<option value="">Seleccione una categoría</option>';

                if (serviceId) {
                    fetch(`/api/services/${serviceId}/categories`)
                        .then(response => response.json())
                        .then(categories => {
                            categories.forEach(category => {
                                const option = document.createElement('option');
                                option.value = category.id;
                                option.textContent = category.name;
                                categorySelect.appendChild(option);
                            });
                        })
                        .catch(error => {
                            console.error('Error al cargar categorías:', error);
                        });
                }
            });
        });
    </script>
@endpush
