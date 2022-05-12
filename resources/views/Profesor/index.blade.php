@extends('layout')
@section('titulo', 'Página Principal')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_inicio.css') }}">
@endsection

@section('cuerpo')
    <div>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="d-flex flex-wrap justify-content-center">
                <a href="{{ route('precios.index') }}" class="">
                    <button class="btn btn-primary mt-5 mx-5">Ver mis precios</button>
                </a>
                <a href="{{ route('precios.index') }}" class="">
                    <button class="btn btn-primary mt-5 mx-5">Ver mis solicitudes</button>
                </a>
            </div>
            <div class="d-flex justify-content-center">
                <div class="text-center mt-5">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h1 class="text-center">Vista de alumno sobre el {{ Auth::user()->role_id }}</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-evenly mb-5 pb-5">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <div class="cajaImg_profesor">
                            <div
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="rounded-circle img-fluid overflow-hidden"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->role_id }}"
                                    width="150px" height="150px" />
                            </div>
                        </div>
                        <span class="fw-bold mt-4">{{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}</span>
                        <span class="fw-bold text-primary mt-4">{{ Auth::user()->email }}</span>
                        {{-- inicio bucle redes sociales --}}
                        <div class="div_socials d-flex flex-row align-items-center text-center mt-3">
                            {{-- si es github --}}
                            <a href="{{-- {{ Auth::user()->redes_sociales->link->github }} --}}" class="social m-3">
                                <span class="fa-brands fa-2x fa-github"></span>
                            </a>
                            {{-- si es linkedin --}}
                            <a href="{{-- {{ Auth::user()->redes_sociales->link->linkedin }} --}}" class="social m-3">
                                <span class="fa-brands fa-2x fa-linkedin"></span>
                            </a>
                            {{-- si es discord --}}
                            <a href="{{-- {{ Auth::user()->redes_sociales->link->discord }} --}}" class="social m-3">
                                <span class="fa-brands fa-2x fa-discord"></span>
                            </a>
                            {{-- si es facebook --}}
                            <a href="{{-- {{ Auth::user()->redes_sociales->link->facebook }} --}}" class="social m-3">
                                <span class="fa-brands fa-2x fa-facebook"></span>
                            </a>
                        </div>
                        {{-- fin bucle redes sociales --}}
                    </div>
                </div>
                <div class="d-flex col-md-7 border-right m-2 align-items-center">
                    <div class="col-md-8">
                        <p class="h3 fw-bold text-decoration-underline">Descripción sobre el Profesor</p>
                        <div class="mt-4">
                            <p class="h6">{{ Auth::User()->descripcion }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-4">
                            <p class="h3 fw-bold text-decoration-underline">Idioma</p>
                            <div class="mt-4">
                                <p class="h6">{{ Auth::User()->idioma }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-10 container">
                    <div class="p-3 py-5">
                        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                            <h1 class="display-4 fw-normal">Precios</h1>
                        </div>
                        <div class="row row-cols-1 row-cols-md-3 mb-3 text-center align-items-center">


                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm">
                                    <div class="card-header py-3">
                                        <h4 class="my-0 fw-normal">Primer Precio</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">
                                            10€<small class="text-muted fw-light">/h</small>
                                        </h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li>Ejercicios Personalizados</li>
                                        </ul>
                                        <button type="button" class="w-100 btn btn-lg btn-outline-primary">
                                            Solicitar Servicio
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm">
                                    <div class="card-header py-3">
                                        <h4 class="my-0 fw-normal">Segundo Precio</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">
                                            20€<small class="text-muted fw-light">/h</small>
                                        </h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li>Ejercicios Personalizados</li>
                                            <li>Practica Verbal / Escrita</li>
                                        </ul>
                                        <button type="button" class="w-100 btn btn-lg btn-primary">Solicitar
                                            Servicio</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card mb-4 rounded-3 shadow-sm border-primary">
                                    <div class="card-header py-3 text-white bg-primary border-primary">
                                        <h4 class="my-0 fw-normal">Tercer Precio</h4>
                                    </div>
                                    <div class="card-body">
                                        <h1 class="card-title pricing-card-title">
                                            30€<small class="text-muted fw-light">/h</small>
                                        </h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li>Ejercicios Personalizados</li>
                                            <li>Practica Verbal / Escrita</li>
                                            <li>Examenes de Prueba</li>
                                        </ul>
                                        <button type="button" class="w-100 btn btn-lg btn-primary">Solicitar
                                            Servicio</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-md-8 col-lg-6">
                                <div class="header">
                                    <h2>Especialidades</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <!-- Single Product -->
                            {{-- Inicio Bucle especialidades --}}
                            <div class="col-md-8 col-lg-6 col-xl-5">
                                <div class="card bg-dark text-light m-3">
                                    <div class="m-4">
                                        <p class="card-caption h2 text-red">
                                            Nivel: A2
                                        </p>
                                        <p class="mt-4">
                                            Nota Final:
                                        </p>
                                        <p class="text-center h1">7</p>
                                        <table class="mt-4 table table-bordered border-light table-dark">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col text-center">Fecha de Finalización</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">19 / 6 / 2022</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- Fin Bucle Especialidades --}}
                            {{-- Inicio Bucle especialidades --}}
                            <div class="col-md-8 col-lg-6 col-xl-5">
                                <div class="card bg-dark text-light m-3">
                                    <div class="m-4">
                                        <p class="card-caption h2 text-red">
                                            Nivel: B1
                                        </p>
                                        <p class="mt-4">
                                            Nota Final:
                                        </p>
                                        <p class="text-center h1">9</p>
                                        <table class="mt-4 table table-bordered border-light table-dark">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">Fecha de Finalización</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">19 / 6 / 2022</td>
                                                </tr>
                                            </tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- Fin Bucle Especialidades --}}
                            {{-- Inicio Bucle especialidades --}}
                            <div class="col-md-8 col-lg-6 col-xl-5">
                                <div class="card bg-dark text-light m-3">
                                    <div class="m-4">
                                        <p class="card-caption h2 text-red">
                                            Nivel: B2
                                        </p>
                                        <p class="mt-4">
                                            Nota Final:
                                        </p>
                                        <p class="text-center h1">6,5</p>
                                        <table class="mt-4 table table-bordered border-light table-dark">
                                            <thead>
                                                <tr class="text-center">
                                                    <th scope="col">Fecha de Finalización</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">19 / 6 / 2022</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            {{-- Fin Bucle Especialidades --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
