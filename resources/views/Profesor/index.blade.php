@extends('layout')
@section('titulo', 'Página Principal')
@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_inicio.css') }}">
@endsection
@section('cuerpo')
    <div class="container mainContainer rounded mt-5 mb-5">
        <div class="d-flex justify-content-center">
            <div class="text-center mt-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h1 class="text-center">Vista de alumno sobre el {{ $user->role_id }}</h1>
                </div>
            </div>
        </div>
        <div class="row justify-content-evenly mb-5 pb-5">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <div class="cajaImg_profesor">
                        <div
                            class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="rounded-circle img-fluid overflow-hidden" src="{{ $user->profile_photo_url }}"
                                alt="{{ $user->role_id }}" width="150px" height="150px" />
                        </div>
                    </div>
                    <span class="fw-bold mt-4">{{ $user->nombre }} {{ $user->apellidos }}</span>
                    <span class="fw-bold text-primary mt-4">{{ $user->email }}</span>
                    {{-- inicio bucle redes sociales --}}
                    <div class="div_socials d-flex flex-row align-items-center text-center mt-3">
                        {{-- <!--si es github-->
                            <a href="" class="social m-3">
                                <span class="fa-brands fa-2x fa-github"></span>
                            </a>
                            <!--si es linkedin-->
                            <a href="" class="social m-3">
                                <span class="fa-brands fa-2x fa-linkedin"></span>
                            </a>
                            <!--si es discord-->
                            <a href="" class="social m-3">
                                <span class="fa-brands fa-2x fa-discord"></span>
                            </a>
                            <!--si es facebook-->
                            <a href="" class="social m-3">
                                <span class="fa-brands fa-2x fa-facebook"></span>
                            </a> --}}
                        @forelse ($user->social as $socials)
                            <div class="fotoPerfil">
                                <a href="" class="social m-3">
                                    <div class="cajaImg_platform">
                                        <img src="{{ asset('imagenes/platformImages/' . $socials->platform->platformImage) }}"
                                            alt="{{ $socials->platform->nombre }}" style="width: 32px;">
                                    </div>
                                </a>
                            </div>
                        @empty
                            <p class="fst-italic fw-bold">Este usuario no dispone Plataformas donde contactar con el aún...
                            </p>
                        @endforelse
                        {{-- @if (!isset($user->social))
                            <!--si NO tiene redes sociales irá al siguiente-->
                            @foreach ($user->social as $socials)
                                <div class="fotoPerfil">
                                    <a href="" class="social m-3">
                                        <div class="cajaImg_platform">
                                            <img src="{{ asset('imagenes/platformImages/' . $socials->platform->platformImage) }}"
                                                alt="{{ $socials->platform->nombre }}" style="width: 32px;">
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <p class="fst-italic fw-bold">Este usuario no dispone Plataformas donde contactar con el aún...
                            </p>
                        @endif --}}
                    </div>
                    {{-- fin bucle redes sociales --}}
                </div>
            </div>
            <div class="d-flex col-md-7 border-right m-2 align-items-center">
                <div class="col-md-8">
                    <p class="h3 fw-bold text-decoration-underline">Descripción sobre el Profesor</p>
                    <div class="mt-4">
                        <p class="h6">{{ $user->descripcion }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="col-md-4">
                        <p class="h3 fw-bold text-decoration-underline">Idioma</p>
                        <div class="mt-4">
                            <p class="h6">{{ $user->idioma }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-10 container">
            <div class="p-3 py-5">
                <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                    <h2 class="">Cursos</h2>
                </div>
                <div class="justify-content-center row row-cols-1 row-cols-md-3 mb-3 text-center align-items-center">
                    {{-- Bucle de precios --}}
                    @foreach ($user->studies as $study)
                        @if ($study->courses)
                            @foreach ($study->courses as $curso)
                                <div class="col">
                                    <div class="priEstContainer mb-4 text-dark rounded-3 shadow-sm text-light">
                                        <div class="card-header py-3">
                                            <h4 class="my-0 fw-normal ">{{ $curso->nombreCurso }}</h4>
                                        </div>
                                        <div class="card-body">
                                            <p class="h1 card-title pricing-card-title my-3">
                                                {{ $curso->precio }}<small>€</small>
                                            </p>
                                            <div>
                                                <p
                                                    class="h5 mx-5 card-title pricing-card-title border-top border-dark my-3 pt-3">
                                                    Descripción del Curso:
                                                </p>
                                            </div>
                                            <ul class="list-unstyled mt-3 mb-4">
                                                <li>{{ $curso->descripcion }}</li>
                                            </ul>
                                            <a href="{{ route('ordersstudent.createOrder', $curso) }}">
                                                <button type="button" class="w-100 btn btn-lg btn-dark fw-bold">
                                                    Comprar Curso
                                                </button>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="priEstContainer col-md-6 mb-5">
                                <div class="h-100 p-5 text-white rounded-3">
                                    <h2 class="text-dark">Este profesor aun no a añadido Estudios realizados</h2>
                                    <p class="fst-italic mb-0 text-dark fw-bold mt-4">Seguro que añadirá muy pronto...
                                    </p>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
        {{-- Estudios --}}
        <div class="col-md-10 container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-md-8 col-lg-6">
                    <div class="header">
                        <h2>Estudios</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center text-dark">
                <!-- Single Product -->
                {{-- Inicio Bucle especialidades --}}
                @forelse ($user->studies as $study)
                    <div class="priEstContainer col-md-8 col-lg-6 col-xl-5 m-5">
                        <div class="text-dark">
                            <div class="p-5">
                                <p class="card-caption h2 text-red">
                                    {{ $study->nivel->nombre }}
                                </p>
                                <p class="pt-4">
                                    Nota Final:
                                </p>
                                <p class="text-center h1">{{ $study->nota }}</p>
                                <div class="d-flex row mt-4">
                                    <div class="flex-start">
                                        Fecha Finalizacion
                                    </div>
                                    <div class=" mt-4">
                                        <p class="text-center">{{ $study->fechaFinalizacion }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="priEstContainer col-md-6 mb-5 text-dark">
                        <div class="h-100 p-5 rounded-3">
                            <h2>Este profesor aun no a añadido Estudios realizados</h2>
                            <p class="fst-italic mb-0  fw-bold mt-4">Seguro que añadirá muy pronto...</p>
                        </div>
                    </div>
                @endforelse
                {{-- Fin Bucle Especialidades --}}
            </div>
        </div>
        {{-- Fin Estudios --}}
        <div class="d-flex flex-wrap justify-content-center">
            <a href="/"><button class="btn btn-lg btn-primary my-5">Volver al Inicio</button></a>
        </div>
    </div>
@endsection
