@extends('front.layouts.base')

@section('title', 'Nuestros Servicios')

@section('content')
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url({{ asset('assets/images/bg_2.jpg') }}); background-position: 50% 39.5px; height: 350px;"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 350px;">
                <div class="col-md-9 ftco-animate pb-5 fadeInUp ftco-animated">
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i
                                    class="fa fa-chevron-right"></i></a></span> <span>Servicios <i
                                class="fa fa-chevron-right"></i></span></p>
                    <h1 class="mb-3 bread">Nuestros Servicios</h1>
                </div>
            </div>
        </div>
    </section>
    @include('front.components.services-component')
    <livewire:front.customer-carousel-component />
@endsection
