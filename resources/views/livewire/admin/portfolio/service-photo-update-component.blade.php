<div>
    <div class="page-header">
        <h3 class="fw-bold mb-3">Editar Foto</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home">
                <a href="{{ route('admin.dashboard') }}">
                    <i class="icon-home"></i>
                </a>
            </li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item">Portafolio</li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item"><a href="{{ route('admin.portfolio.service-photos.index') }}">Fotos</a></li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item">Editar Foto</li>
        </ul>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <form wire:submit.prevent="update">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Foto</h4>
                    </div>
                    <div class="card-body">
                        <div class="my-2">@include('back.auth.layouts.messages')</div>

                        <div class="mb-3">
                            <label for="service" class="form-label">Servicio</label>
                            <select wire:model="service_id" class="form-select" id="service">
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
                            <select wire:model="service_category_id" class="form-select" id="service_category_id">
                                <option value="">Seleccione una categoría</option>
                                @foreach ($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                @endforeach
                            </select>
                            @error('service_category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="caption" class="form-label">Descripción (opcional)</label>
                            <textarea wire:model="caption" class="form-control" id="caption" rows="3"></textarea>
                            @error('caption')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen (opcional)</label>
                            <input type="file" wire:model="image" id="image" class="form-control">
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        @if ($image)
                            <div class="mt-3">
                                <p class="fw-bold">Vista previa nueva imagen:</p>
                                <img src="{{ $image->temporaryUrl() }}" class="img-fluid rounded shadow"
                                    style="max-height: 120px;">
                            </div>
                        @elseif ($currentImage)
                            <div class="mt-3">
                                <p class="fw-bold">Imagen actual:</p>
                                <img src="{{ asset('storage/' . $currentImage) }}" class="img-fluid rounded shadow"
                                    style="max-height: 120px;">
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="mt-4 d-flex gap-2">
                            <a href="{{ route('admin.portfolio.service-photos.index') }}"
                                class="btn btn-danger">Cancelar</a>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
