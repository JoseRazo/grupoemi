@extends('back.layouts.base')
@section('content')
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Dashboard</h3>
            <h6 class="op-7 mb-2">Panel de Administración</h6>
        </div>
    </div>

    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px;">
        <div class="card card-round p-2">
            <div class="card-body text-center">
                <h4 class="mb-2">Bienvenido</h4>
                <h5 class="fw-bold">{{ Auth::user()->name }}</h5>
                <img src="{{ asset('assets/images/logo-gremi.jpeg') }}" alt="Bienvenido" style="max-width: 280px;"
                    class="mt-4">
            </div>
        </div>
    </div>
@endsection
