<div>
    <div class="page-header">
        <h3 class="fw-bold mb-3">Categorías de Sliders</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i></a></li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item">Componentes</li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item">Categorías de Sliders</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <input type="text" class="form-control w-50" placeholder="Buscar..." wire:model.live="search">

            <button class="btn btn-primary btn-round" wire:click="create">
                <span class="fas fa-plus me-2"></span> Nueva Categoría
            </button>
        </div>

        <div class="card-body">
            @include('back.auth.layouts.messages')

            <div class="table-responsive mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $index => $category)
                            <tr>
                                <td>{{ $categories->firstItem() + $index }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ Str::limit($category->description, 60) }}</td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-info" wire:click="edit({{ $category->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger" wire:click="confirmDelete({{ $category->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="4" class="text-center">No se encontraron categorías.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $categories->links() }}
            </div>
        </div>
    </div>

    @if ($isOpen)
        @include('livewire.admin.components.slider.slider-category-modal')
    @endif
</div>

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        window.Livewire.on('confirmDeleteCategory', id => {
            Swal.fire({
                title: "¿Eliminar categoría?",
                text: "Esta acción eliminará la categoría y los sliders asociados.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Sí, eliminar",
                cancelButtonText: "Cancelar"
            }).then(result => {
                if (result.isConfirmed) {
                    window.Livewire.dispatch('deleteCategory', id);
                }
            });
        });
    });
</script>
@endpush
