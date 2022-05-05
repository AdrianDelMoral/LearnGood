@extends('profesor_layout')

@section('titulo', 'Página Principal')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    {{-- <div class="page-wrapper p-t-180 font-poppins">
        <section class="row justify-content-center">
            <article class="card bg-dark text-light col-md-10">
                <h1 class="text-center my-5">Información del {{ Auth::user()->role_id }}</h1>

                <div class="row align-items-md-stretch m-2">
                    <div class="col-md-2 mr-5">
                        <div>
                            <div class="fotoPerfil_profesorView">
                                <div class="cajaImg_profesorView">
                                    <div>
                                        <img src="{{ Auth::user()->profile_photo_url }}"
                                            alt="{{ Auth::user()->role_id }}" />
                                    </div>
                                </div>

                            </div>
                            {{ Auth::user()->nombre }}
                            {{ Auth::user()->apellidos }}
                        </div>

                    </div>
                    <div class="col-md-10">
                        Descripción
                        <div class="card">
                            <h2 class="mt-5 mb-3 lane text-center">Descripción del Profesor</h2>
                            <div class="p-4">
                                @if (Auth::user()->descripcion === null)
                                    <p>La descripción del usuario actualmente está vacia. Prueba a rellenar el campo desde
                                        el formulario proporcionado con el boton editar.</p>
                                @else
                                    <p>{{ Auth::user()->descripcion }}</p>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if (Auth::user()->role_id === 'Admin' || Auth::user()->role_id === 'Profesor')
                        <div class="justify-content-end">
                            <button class="btn btn-success">Editar Información de Perfil</button>
                        </div>
                    @endif
                </div>
                <br>
                <br>
                <br>
                <div>
                    recibir tabla precios
                </div>
                <div>
                    recibir tabla especialidades
                </div>
            </article>
        </section>
    </div> --}}

    <div class="container rounded bg-white mt-5 mb-5">
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
                    {{-- <img src="{{ Auth::user()->profile_photo_path }}" alt="avatar" class="rounded-circle img-fluid"
                        width="150px" height="150px"> --}}
                        <div class="cajaImg_profesor">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <div class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="rounded-circle img-fluid overflow-hidden" src="{{ Auth::user()->profile_photo_url }}"
                                        alt="{{ Auth::user()->role_id }}" width="150px" height="150px"/>
                                </div>
                            @else
                                <h1>{{ Auth::user()->nombre }} - Rol: {{ Auth::user()->role_id }}
                                </h1>
                            @endif
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
            <div class="col-md-5 border-right">
                <div class="p-3 py-5">

                    <div class="row mt-3">
                        @if (Auth::user()->descripcion === null)
                            <div class="col-md-12 mb-3">
                                <p class="h3 fw-bold">Descripción sobre el Profesor</p>
                                <div>
                                    <p>Este profesor aún no a escrito nada sobre el</p>
                                    {{ Auth::user()->descripcion }}
                                </div>
                            </div>
                        @else
                            <div class="col-md-12 mb-3">
                                <p class="h3 fw-bold">Descripción sobre el Profesor</p>
                                <p>{{ Auth::user()->descripcion }}</p>
                            </div>
                        @endif

                        <div class="row mt-3 justify-content-evenly">
                            <div class="col-md-3">
                                <p class="h3 fw-bold">País</p>
                                <p>{{ Auth::user()->pais }}</p>
                            </div>
                            <div class="col-md-3">
                                <p class="h3 fw-bold">Ciudad</p>
                                <p>{{ Auth::user()->ciudad }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-10 container">
                <div class="p-3 py-5">
                    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                        <h1 class="display-4 fw-normal">Precios</h1>
                    </div>
                    <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
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
                                        <li>1h de clase</li>
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
                                    <h1 class="card-title pricing-card-title">15€</h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>3h de clase</li>
                                        <li>Videos personalizados</li>
                                    </ul>
                                    <button type="button" class="w-100 btn btn-lg btn-primary">Solicitar Servicio</button>
                                </div>
                            </div>
                        </div>
                        <div class="col">

                            <div class="card mb-4 rounded-3 shadow-sm border-primary">
                                <div class="card-header py-3 text-white bg-primary border-primary">
                                    <h4 class="my-0 fw-normal">Tercer Precio</h4>
                                </div>
                                <div class="card-body">
                                    <h1 class="card-title pricing-card-title">30€</h1>
                                    <ul class="list-unstyled mt-3 mb-4">
                                        <li>6h de clase</li>
                                        <li>Prioridad ante los demás</li>
                                        <li>Videos personalizados</li>
                                    </ul>
                                    <button type="button" class="w-100 btn btn-lg btn-primary">Solicitar Servicio</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
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
                                        Licenciado en Matemáticas
                                    </p>
                                    <p class="mt-4">
                                        Nota Final:
                                    </p>
                                    <p class="text-center h1">7</p>
                                    <table class="mt-4 table table-bordered border-light table-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col text-center">Inicio</th>
                                                <th scope="col text-center">Finalización</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">22 / 9 / 2018</td>
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
                                        Licenciado en Historia de ESPAÑA
                                    </p>
                                    <p class="mt-4">
                                        Nota Final:
                                    </p>
                                    <p class="text-center h1">9</p>
                                    <table class="mt-4 table table-bordered border-light table-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col text-center">Inicio</th>
                                                <th scope="col text-center">Finalización</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">22 / 9 / 2017</td>
                                                <td class="text-center">19 / 6 / 2018</td>
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
                                        Licenciado en Quimica
                                    </p>
                                    <p class="mt-4">
                                        Nota Final:
                                    </p>
                                    <p   class="text-center h1">6,5</p>
                                    <table class="mt-4 table table-bordered border-light table-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col text-center">Inicio</th>
                                                <th scope="col text-center">Finalización</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">22 / 9 / 2013</td>
                                                <td class="text-center">19 / 6 / 2015</td>
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
@endsection
