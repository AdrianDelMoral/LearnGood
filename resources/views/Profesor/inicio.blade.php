@extends('layout')
@section('titulo', 'Admin View')
@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/admin/inicio_inicio.css') }}">
@endsection
@section('cuerpo')
    <div class="container px-4 py-5" id="custom-cards">
        <div class="d-flex justify-content-between border-top border-bottom">
            <h2 class="pb-2"><strong class="text-primary text-decoration-underline">Inicio de:</strong>
                {{ Auth::User()->nombre }}</h2>
            <h2 class="pb-2"><strong class="text-primary text-decoration-underline">Tipo de Usuario:</strong>
                {{ Auth::User()->role_id }}</h2>
        </div>
        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5 justify-content-center">
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('unsplash-photo-2.jpg');">
                    <div
                        class="d-flex align-items-center justify-content-center flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mb-4 text-center display-6 lh-1 fw-bold">Vista de Alumno</h2>

                        <ul class="d-flex list-unstyled mt-auto mb-5">
                            <li class="me-auto">
                                <a href="{{ route('teacherviews.index') }}">
                                    <button class="btn btn-primary">Ver Vista</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('unsplash-photo-2.jpg');">
                    <div
                        class="d-flex align-items-center justify-content-center flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mb-4 text-center display-6 lh-1 fw-bold">Gestionar Precios</h2>

                        <ul class="d-flex list-unstyled mt-auto mb-5">
                            <li class="me-auto">
                                <a href="{{ route('precios.index') }}" class="">
                                    <button class="btn btn-primary">Ver Crud</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('unsplash-photo-2.jpg');">
                    <div
                        class="d-flex align-items-center justify-content-center flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mb-4 text-center display-6 lh-1 fw-bold">Gestionar Alumnos</h2>

                        <ul class="d-flex list-unstyled mt-auto mb-5">
                            <li class="me-auto">
                                <a href="{{-- {{ route('niveles.index') }} --}}">
                                    <button class="btn btn-primary">Ver Crud</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('unsplash-photo-2.jpg');">
                    <div
                        class="d-flex align-items-center justify-content-center flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mb-4 text-center display-6 lh-1 fw-bold">Gestionar Redes Sociales</h2>

                        <ul class="d-flex list-unstyled mt-auto mb-5">
                            <li class="me-auto">
                                <a href="{{-- {{ route('socials.index') }} --}}">
                                    <button class="btn btn-primary">Ver Crud</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card card-cover h-100 overflow-hidden text-white bg-dark rounded-5 shadow-lg"
                    style="background-image: url('unsplash-photo-2.jpg');">
                    <div
                        class="d-flex align-items-center justify-content-center flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                        <h2 class="pt-5 mb-4 text-center display-6 lh-1 fw-bold">Gestionar Niveles de Ingles</h2>

                        <ul class="d-flex list-unstyled mt-auto mb-5">
                            <li class="me-auto">
                                <a href="{{-- {{ route('niveles.index') }} --}}">
                                    <button class="btn btn-primary">Ver Crud</button>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
