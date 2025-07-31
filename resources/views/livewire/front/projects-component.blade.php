<div>
    <section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-10 heading-section text-center ftco-animate fadeInUp ftco-animated">
                    <span class="subheading">Nuestros Proyectos</span>
                    <h2 class="mb-4">Trabajos Realizados</h2>
                </div>
            </div>
            <div class="row d-flex">
                @foreach ($categories as $category)
                    @php
                        $firstPhoto = $category->photos->first();
                        $slug = Str::slug($category->name);
                    @endphp
                    @if ($firstPhoto)
                        <div class="col-lg-4 d-flex align-items-stretch ftco-animate fadeInUp ftco-animated mb-5">
                            <div class="blog-entry h-100 d-flex flex-column">
                                <a href="{{ route('projects.by.category', ['slug' => $slug]) }}" class="block-20"
                                    style="background-image: url('{{ asset('storage/' . $firstPhoto->path) }}'); height: 250px;">
                                </a>
                                <div class="text d-block text-center flex-grow-1 d-flex flex-column">
                                    <h3 class="heading" style="margin-bottom: 1px">
                                        <a
                                            href="{{ route('projects.by.category', ['slug' => $slug]) }}">{{ $category->name }}</a>
                                    </h3>
                                    <div class="mt-auto">
                                        <a href="{{ route('projects.by.category', ['slug' => $slug]) }}"
                                            class="btn btn-secondary py-2 px-3">Más Información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>
</div>
