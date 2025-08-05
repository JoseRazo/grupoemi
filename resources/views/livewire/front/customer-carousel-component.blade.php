<div>
    @push('styles')
        <style>
            .swiper-slide-customers {
                display: flex;
                align-items: center;
                justify-content: center;
                height: 220px;
            }

            .swiper-slide-customers img {
                max-height: 90px;
                max-width: 100%;
                object-fit: contain;
                margin-bottom: 15px
            }
        </style>
    @endpush

    <section class="ftco-section bg-light">
        <div class="">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate fadeInUp ftco-animated">
                    <h2 class="mb-4">Nuestros Colaboradores</h2>
                </div>
            </div>

            <div class="swiper mySwiper bg-white" style="margin: 0 15px">
                <div class="swiper-wrapper">
                    @foreach ($customers->chunk(2) as $pair)
                        <div class="swiper-slide swiper-slide-customers">
                            <div class="d-flex flex-column align-items-center gap-3">
                                @foreach ($pair as $customer)
                                    <img src="{{ asset('storage/' . $customer->logo) }}" alt="{{ $customer->name }}">
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            const swiper = new Swiper('.mySwiper', {
                slidesPerView: 4,
                spaceBetween: 30,
                loop: true,
                autoplay: {
                    delay: 2500,
                    disableOnInteraction: false,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                    1280: {
                        slidesPerView: 4,
                    }
                },
            });
        </script>
    @endpush
</div>
