@extends('front.layouts.base')

@section('title', 'Inicio')

@section('content')
    @include('front.layouts.hero')
    @include('front.components.about-component')
    @include('front.components.services-component')
@endsection
