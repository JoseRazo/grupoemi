@extends('front.layouts.base')

@section('title', 'Inicio')

@section('content')
    @include('front.layouts.hero')
    @include('front.components.about-component')
    <livewire:front.projects-component />
    @include('front.components.services-component')
    <livewire:front.customer-carousel-component />
@endsection
