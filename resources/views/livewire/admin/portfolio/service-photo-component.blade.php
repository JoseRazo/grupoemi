<div>
    <div class="page-header">
        <h3 class="fw-bold mb-3">Fotos del Portafolio</h3>
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
            <li class="nav-item">Fotos</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row g-3 align-items-center">
                <div class="col-sm-12 col-md-6 dflex justify-content-md-start">
                    <div class="form-group">
                        <div class="input-icon">
                            <input type="text" class="form-control" placeholder="Buscar por título o servicio..."
                                wire:model.live="search">
                            <span class="input-icon-addon">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-md-end">
                    @permission('create-service-photos')
                        <a href="{{ route('admin.portfolio.service-photos.create') }}" class="btn btn-primary btn-round">
                            <span class="fas fa-plus me-2"></span> Agregar Foto
                        </a>
                    @endpermission
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="my-2">
                @include('back.auth.layouts.messages')
            </div>

            <div class="table-responsive">
                <table class="table mt-3">
                    <thead>
                        <tr>
                            <th style="width:5%;">#</th>
                            <th style="width:20%;">IMAGEN</th>
                            <th style="width:30%;">CATEGORÍA</th>
                            <th style="width:30%;">DESCRIPCIÓN</th>
                            <th class="text-end" style="width:15%;">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($photos as $index => $photo)
                            <tr>
                                <td>{{ $photos->firstItem() + $index }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $photo->path) }}" alt="{{ $photo->category->name }}"
                                        width="60">
                                </td>
                                <td>{{ $photo->category->name ?? 'N/A' }}</td>
                                <td>{{ \Illuminate\Support\Str::limit($photo->caption, 50) }}</td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        @permission('update-service-photos')
                                            <a href="{{ route('admin.portfolio.service-photos.edit', $photo->id) }}"
                                                class="btn btn-info btn-sm me-1">
                                                <span class="fas fa-edit"></span> Editar
                                            </a>
                                        @endpermission
                                        @permission('delete-service-photos')
                                            <button class="btn btn-danger btn-sm"
                                                wire:click="confirmDelete({{ $photo->id }})">
                                                <span class="fas fa-trash"></span> Eliminar
                                            </button>
                                        @endpermission
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No se encontraron fotos.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $photos->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.Livewire.on('confirmDeletePhoto', id => {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Esta acción no se puede revertir.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar"
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.Livewire.dispatch('deletePhoto', id);
                    }
                });
            });
        });
    </script>
@endpush
