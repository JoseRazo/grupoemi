<div>
    <div class="page-header">
        <h3 class="fw-bold mb-3">Categorías de Servicios</h3>
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
            <li class="nav-item">Categorías de Servicios</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header">
            <div class="row g-3 align-items-center">
                <div class="col-sm-12 col-md-6 dflex justify-content-md-start">
                    <div class="form-group">
                        <div class="input-icon">
                            <input type="text" class="form-control" placeholder="Buscar categoría..."
                                wire:model.live="search">
                            <span class="input-icon-addon">
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 d-flex justify-content-md-end">
                    @permission('create-service-categories')
                        <button class="btn btn-primary btn-round" wire:click="create">
                            <span class="fas fa-plus me-2"></span> Agregar categoría
                        </button>
                    @endpermission
                    @if ($isOpen)
                        @include('livewire.admin.portfolio.service-category-modal')
                    @endif
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
                            <th style="width:20%;">CATEGORÍA</th>
                            <th style="width:35%;">SERVICIO</th>
                            <th style="width:20%;">DESCRIPCIÓN</th>
                            <th class="text-end" style="width:20%;">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $index => $cat)
                            <tr>
                                <td>{{ $categories->firstItem() + $index }}</td>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->service->name }}</td>
                                <td>{{ $cat->description }}</td>
                                <td>
                                    <div class="d-flex justify-content-end gap-2">
                                        @permission('update-service-categories')
                                            <button class="btn btn-info btn-sm me-1" wire:click="edit({{ $cat->id }})">
                                                <span class="fas fa-edit"></span> Editar
                                            </button>
                                        @endpermission
                                        @permission('delete-service-categories')
                                            <button class="btn btn-danger btn-sm"
                                                wire:click="confirmDelete({{ $cat->id }})">
                                                <span class="fas fa-trash"></span> Eliminar
                                            </button>
                                        @endpermission
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No se encontraron categorías.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="mt-3">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.Livewire.on('confirmDeleteCategory', id => {
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
                        window.Livewire.dispatch('deleteCategory', id);
                    }
                });
            });
        });
    </script>
@endpush
