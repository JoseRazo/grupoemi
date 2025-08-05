<div>
    <div class="page-header">
        <h3 class="fw-bold mb-3">Sliders</h3>
        <ul class="breadcrumbs mb-3">
            <li class="nav-home"><a href="{{ route('admin.dashboard') }}"><i class="icon-home"></i></a></li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item">Componentes</li>
            <li class="separator"><i class="icon-arrow-right"></i></li>
            <li class="nav-item">Sliders</li>
        </ul>
    </div>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <input type="text" class="form-control w-50" placeholder="Buscar..." wire:model.live="search">

            <button class="btn btn-primary btn-round" wire:click="create">
                <span class="fas fa-plus me-2"></span> Agregar Slider
            </button>
        </div>

        <div class="card-body">
            @include('back.auth.layouts.messages')

            <div class="table-responsive mt-3">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Imagen</th>
                            <th>Título</th>
                            <th>Categoría</th>
                            <th>Estado</th>
                            <th class="text-end">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($sliders as $index => $slider)
                            <tr>
                                <td>{{ $sliders->firstItem() + $index }}</td>
                                <td><img src="{{ asset('storage/' . $slider->image) }}" width="60"></td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->category->name }}</td>
                                <td>
                                    <span class="badge {{ $slider->is_active ? 'bg-success' : 'bg-danger' }}">
                                        {{ $slider->is_active ? 'Activo' : 'Inactivo' }}
                                    </span>
                                </td>
                                <td class="text-end">
                                    <button class="btn btn-sm btn-info" wire:click="edit({{ $slider->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm btn-danger"
                                        wire:click="confirmDelete({{ $slider->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">No se encontraron sliders.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $sliders->links() }}
            </div>
        </div>
    </div>

    @if ($isOpen)
        @include('livewire.admin.components.slider.slider-modal')
    @endif
</div>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            window.Livewire.on('confirmDeleteSlider', id => {
                Swal.fire({
                    title: "¿Estás seguro?",
                    text: "Esta acción no se puede revertir.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Sí, eliminar",
                    cancelButtonText: "Cancelar"
                }).then(result => {
                    if (result.isConfirmed) {
                        window.Livewire.dispatch('deleteSlider', id);
                    }
                });
            });
        });
    </script>
@endpush
