@extends('layout')
@section('titulo', 'Admin View')
@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/admin/admin_inicio.css') }}">
@endsection
@section('cuerpo')
    <div class="container px-4 py-5" id="custom-cards">
        <h2 class="pb-2 border-bottom">Admin Inicio</h2>
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('unsplash-photo-1.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Gestionar Usuarios</h2>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto"> <a href="{{ route('manageusers.index') }}"><button
                                        class="btn btn-primary">Ver Crud</button></a> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('unsplash-photo-2.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Gestionar Plataformas</h2>
                        </h2>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto"> <a href="{{ route('platforms.index') }}"><button
                                        class="btn btn-primary">Ver Crud</button></a> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('unsplash-photo-3.jpg');">
                    <div class="d-flex flex-column h-100 p-5 pb-3 text-shadow-1">
                        <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Gestionar Niveles de Ingles</h2>
                        <ul class="d-flex list-unstyled mt-auto">
                            <li class="me-auto"> <a href="{{ route('levels.index') }}"><button
                                        class="btn btn-primary">Ver Crud</button></a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
