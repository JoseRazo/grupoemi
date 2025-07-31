<div>
    <div class="row">
        <div class="col-12">
            <!-- Galería de proyectos -->
            <div class="row">
                @foreach ($projects as $photo)
                    <div class="col-md-6 col-lg-4 ftco-animate fadeInUp ftco-animated">
                        <div class="project">
                            <a href="{{ asset('storage/' . $photo->path) }}"
                                class="img image-popup d-flex align-items-center"
                                style="background-image: url('{{ asset('storage/' . $photo->path) }}');">
                                <div class="icon d-flex align-items-center justify-content-center mb-5">
                                    <span class="fa fa-plus"></span>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Carga infinita -->
    @if ($projects->hasMorePages())
        <div wire:poll.visible="loadMore" class="text-center mt-4">
            <span class="spinner-border text-primary" role="status"></span>
            <p>Cargando más proyectos...</p>
        </div>
    @endif
</div>