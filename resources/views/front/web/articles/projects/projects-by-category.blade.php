@extends('front.layouts.base')

@section('title', 'Nuestros Proyectos')

@section('content')
    <section class="hero-wrap hero-wrap-2"
        style="background-image: url({{ asset('assets/images/bg_2.jpg') }}); background-position: 50% 39.5px; height: 350px;"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-end justify-content-start" style="height: 350px;">
                <div class="col-md-9 ftco-animate pb-5 fadeInUp ftco-animated">
                    <p class="breadcrumbs">
                        <span class="mr-2"><a href="{{ route('home') }}">Home <i
                                    class="fa fa-chevron-right"></i></a></span>
                        <span><a href="{{ route('projects') }}">Proyectos</a> <i class="fa fa-chevron-right"></i></span>
                    </p>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section" id="projects">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-10 heading-section text-center ftco-animate">
                    <h2 class="mb-4">{{ $category->name }}</h2>
                </div>
            </div>
            <livewire:front.projects-infinite-scroll :slug="$slug" />
        </div>
    </section>
@endsection
