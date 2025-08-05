@push('styles')
    <style>
        .hero-wrap {
            position: relative;
            z-index: 1;
        }

        .ftco-services-2 {
            position: relative;
            z-index: 2;
        }
    </style>
@endpush
<!-- Swiper Slider Section -->
<section class="hero-wrap js-fullheight">
    <div class="swiper mySwiperCarousel">
        <div class="swiper-wrapper">

            @foreach ($sliders as $slider)
                <div class="swiper-slide"
                    style="background-image: url('{{ asset('storage/' . $slider->image) }}'); background-size: cover; background-position: center;">
                    <div class="overlay" style="opacity: .2"></div>
                    <div class="container">
                        <div class="row no-gutters slider-text js-fullheight align-items-center"
                            data-scrollax-parent="true">
                            <div class="col-lg-6 ftco-animate">
                                <div class="mt-5">
                                    <h1 class="mb-4">{!! nl2br(e($slider->title)) !!}</h1>
                                    @if ($slider->subtitle)
                                        <p class="mb-4">{{ $slider->subtitle }}</p>
                                    @else
                                        <p class="mb-4">{{ $siteSettings->about_us }}</p>
                                    @endif
                                    <p>
                                        @if ($slider->button1_href)
                                            <a href="{{ $slider->button1_href }}" class="btn btn-primary">
                                                {{ $slider->button1_text ?? 'Ver más' }}
                                            </a>
                                        @endif
                                        @if ($slider->button2_href)
                                            <a href="{{ $slider->button2_href }}" class="btn btn-white">
                                                {{ $slider->button2_text ?? 'Explorar' }}
                                            </a>
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </div>

        <!-- Optional navigation/pagination -->
        <div class="swiper-pagination"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>
    </div>
</section>


<section class="ftco-section ftco-no-pt ftco-no-pb ftco-services-2">
    <div class="container">
        <div class="row no-gutters d-flex">
            <div class="col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex">
                    <div class="icon justify-content-center align-items-center d-flex">
                        <span class="flaticon-engineer-1"></span>
                    </div>
                    <div class="media-body pl-4">
                        <h3 class="heading mb-3">Brindar Servicio de Calidad</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services services-2 d-flex">
                    <div class="icon justify-content-center align-items-center d-flex">
                        <span class="flaticon-worker-1"></span>
                    </div>
                    <div class="media-body pl-4">
                        <h3 class="heading mb-3">Responsabilidad Profesional</h3>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services d-flex">
                    <div class="icon justify-content-center align-items-center d-flex">
                        <span class="flaticon-engineer"></span>
                    </div>
                    <div class="media-body pl-4">
                        <h3 class="heading mb-3">Comprometidos con Nuestros Clientes</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        const swiperCarousel = new Swiper('.mySwiperCarousel', {
            loop: true,
            effect: 'fade',
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
@endpush
