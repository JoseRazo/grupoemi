<section class="ftco-section bg-half-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">
                <span class="subheading">Nuestros Servicios</span>
                <h2 class="mb-4">Ofrecemos Servicios</h2>
            </div>
        </div>

        <div class="row">
            @foreach ($services as $service)
                <div class="col-md-4">
                    <div class="services-wrap ftco-animate fadeInUp ftco-animated">
                        {{-- Imagen dinámica si existe, o una por defecto --}}
                        <div class="img"
                            style="background-image: url('{{ asset('storage/' . $service->image_url) }}');">
                        </div>
                        <div class="text">
                            <div class="icon"><span class="flaticon-architect"></span></div>
                            <h2>{{ $service->name }}</h2>

                            {{-- Mostrar las categorías asociadas --}}
                            @if ($service->categories->isNotEmpty())
                                <ul class="pl-3 text-left">
                                    @foreach ($service->categories as $category)
                                        <li>{{ $category->name }}</li>
                                    @endforeach
                                </ul>
                            @else
                                <p><em>Sin categorías asociadas</em></p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
