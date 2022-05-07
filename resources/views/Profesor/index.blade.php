@extends('layout')
@section('titulo', 'Página Principal')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_inicio.css') }}">
@endsection


@section('cuerpo')
    {{-- <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <div class="col-md-3 border-right">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">

                    <div class="cajaImg_profesor">
                        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <div
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="rounded-circle img-fluid overflow-hidden"
                                    src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->role_id }}"
                                    width="150px" height="150px" />
                            </div>
                        @else
                            <h1>{{ Auth::user()->nombre }} - Rol: {{ Auth::user()->role_id }}</h1>
                        @endif
                    </div>
                    <span class="font-weight-bold mt-4">{{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}</span>
                    <span class="text-black-50 mt-2">{{ Auth::user()->email }}</span>
                    inicio bucle redes sociales
                    <div class="div_socials d-flex flex-row align-items-center text-center mt-3">
                        si es github:
                        <a href="Auth::user()->redes_sociales->link->github" class="social m-3">
                            <span class="fa-brands fa-2x fa-github"></span>
                        </a>
                        si es linkedin:
                        <a href="Auth::user()->id->redes_sociales->link->linkedin" class="social m-3">
                            <span class="fa-brands fa-2x fa-linkedin"></span>
                        </a>
                        si es discord:
                        <a href="Auth::user()->id->redes_sociales->link->discord" class="social m-3">
                            <span class="fa-brands fa-2x fa-discord"></span>
                        </a>
                        si es facebook:
                        <a href="Auth::user()->id->redes_sociales->link->facebook" class="social m-3">
                            <span class="fa-brands fa-2x fa-facebook"></span>
                        </a>
                    </div>
                    fin bucle redes sociales
                </div>
            </div>
            <div class="d-flex flex-column align-items-center col-md-9">
                <div class="col-md-12 border-right">
                    <div class="p-3 py-5">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Ajustes de Perfil - {{ Auth::user()->role_id }}</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-6">
                                <label class="labels">Nombre</label>
                                <input type="text" class="form-control" placeholder="Nombre"
                                    value="{{ Auth::user()->nombre }}">
                            </div>
                            <div class="col-md-6"><label class="labels">Apellidos</label>
                                <input type="text" class="form-control" placeholder="Apellidos"
                                    value="{{ Auth::user()->apellidos }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <fieldset disabled>
                                <div class="col-md-12 mb-3">
                                    <label class="labels">Email</label>
                                    <input type="text" class="form-control" value="{{ Auth::user()->email }}" bloqued>
                                </div>
                            </fieldset>
                            @if (Auth::user()->descripcion === null)
                                <div class="col-md-12 mb-3">
                                    <label for="descripcion" class="labels">Descripción sobre el
                                        Profesor</label>
                                    <textarea class="form-control w-100" rows="3" style="resize: none;"
                                        placeholder="Escribe aquí una descripción que defina tus aptitudes y especialidades"></textarea>
                                </div>
                            @else
                                <div class="col-md-12 mb-3">
                                    <label for="descripcion" class="labels">Descripción sobre el Profesor</label>
                                    <textarea class="form-control w-100" style="resize: none;" rows="5"
                                        placeholder="Escribe aquí una descripción que defina tus aptitudes y especialidades">{{ Auth::user()->descripcion }}</textarea>
                                </div>
                            @endif

                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="labels">Idioma</label>
                            <input type="text" class="form-control" placeholder="Idioma"
                                value="{{ Auth::user()->idioma }}">
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="button">Guardar Ajustes</button>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="p-3 py-5">
                        <div class="col-md-12 mb-4">
                            <label class="labels">Experience in Designing</label>
                            <input type="text" class="form-control" placeholder="experience" value="">
                        </div>
                        <div class="col-md-12 mb-4">
                            <label class="labels">Additional Details</label>
                            <input type="text" class="form-control" placeholder="additional details" value="" </div>
                        </div>
                        <div class="d-flex justify-content-center align-items-center experience mb-4 rounded">
                            <span class="btn btn-primary profile-button">Editar Especialidades</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="d-flex flex-wrap justify-content-center">
                <a href="{{ route('precios.index') }}" class="">
                    <button class="btn btn-primary mt-5 mx-5">Ver mis precios</button>
                </a>
                <button class="btn btn-primary mt-5 mx-5">Ver mis solicitudes</button>
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
                            {{-- @if (!$redes)
                                @foreach ($redes as $red)
                                    <a href="{{ $red->link }}" class="social m-3">
                                        <span class="fa-brands fa-2x fa-github"></span>
                                    </a>
                                @endforeach
                            @else
                                <p class="text-danger fw-bold">Profesor Sin redes Actualmente</p>
                            @endif --}}
                            <!--  {{-- si es github --}}
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
                                                                                            </a>-->
                        </div>
                        {{-- fin bucle redes sociales --}}
                    </div>
                </div>
                <div class="d-flex col-md-5 border-right m-5 align-items-center">
                    @if (!Auth::user()->descripcion)
                        <div class="col-md-6 mb-3">
                            <p class="h3 fw-bold">Descripción sobre el Profesor</p>
                            <div>
                                <p>Este profesor aún no a escrito nada sobre el</p>
                                {{-- {{ Auth::user()->descripcion }} --}}
                            </div>
                        </div>
                    @else
                        <div class="col-md-10 mb-3">
                            <p class="h3 fw-bold">Descripción sobre el Profesor</p>
                            <p>{{ Auth::user()->descripcion }}</p>
                        </div>
                    @endif
                    <div class="row justify-content-evenly">
                        <div class="col-md-3">
                            <p class="h3 fw-bold">Idioma</p>
                            <p>{{ Auth::user()->idioma }}</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-10 container">
                    <div class="p-3 py-5">
                        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                            <h1 class="display-4 fw-normal">Precios</h1>
                        </div>
                        @if (!$precios)
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
                        @else
                            <div class="d-flex row my-5">
                                <h2 class="h4 text-center text-danger fw-text">No se han añadido aun precios</h2>
                                <div class="d-flex justify-content-center">
                                    <a href="{{-- {{ route('precios.index') }} --}}">
                                        <button class="btn btn-primary mt-5 mx-5">Añadir precios</button>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="container">
                        <div class="row justify-content-center text-center">
                            <div class="col-md-8 col-lg-6">
                                <div class="header">
                                    <h2>Especialidades</h2>
                                </div>
                            </div>
                        </div>
                        @if (!$experience)
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
                        @else
                            <div class="d-flex row my-5">
                                <h2 class="h4 text-center text-danger fw-text">No se han añadido aun especialidades
                                </h2>
                                <div class="d-flex justify-content-center">
                                    <a href="{{-- {{ route('precios.index') }} --}}" class="">
                                        <button class="btn btn-primary mt-5 mx-5">Añadir especialidad</button>
                                    </a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
