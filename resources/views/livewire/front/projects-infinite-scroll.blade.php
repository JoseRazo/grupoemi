<div>
    <section class="ftco-section" id="projects">
        <div class="p-5">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 text-center heading-section ftco-animate fadeInUp ftco-animated">
                    <span class="subheading">Nuestros Proyectos</span>
                    <h2 class="mb-4">Trabajos Realizados</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-md-3 order-1 order-md-2">
                    <div class="d-flex flex-column">
                        <span wire:click="$set('selectedCategoryId', null)"
                            class="badge rounded-pill m-1 px-3 py-2 w-100 text-wrap text-center {{ is_null($selectedCategoryId) ? 'bg-primary text-white' : 'bg-light text-dark' }}"
                            role="button" style="cursor: pointer;">
                            Todos
                        </span>

                        @foreach ($categories as $cat)
                            <span wire:click="$set('selectedCategoryId', {{ $cat->id }})"
                                class="badge rounded-pill m-1 px-3 py-2 w-100 text-wrap text-center {{ $selectedCategoryId == $cat->id ? 'bg-primary text-white' : 'bg-light text-dark' }}"
                                role="button" style="cursor: pointer;">
                                {{ $cat->name }}
                            </span>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-md-9 order-2 order-md-1">
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
    </section>
</div>
