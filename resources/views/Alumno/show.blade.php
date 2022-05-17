@extends('layout')
@section('titulo', 'Ver Profesor')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/alumno_show.css') }}">
@endsection

@section('cuerpo')

    <div>
        <div class="container mainContainer rounded mt-5 mb-5">
            <div class="row justify-content-evenly mb-5">
                <div class="mt-5 d-flex justify-content-end container">
                    <a href="{{ route('alumnoviews.index') }}">
                        <button class="btn btn-primary mt-1 mx-5 mb-5">Volver al Listado</button>
                    </a>
                </div>
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                        <div class="cajaImg_profesor"
                        style="position: relative; width: 126px; height: 116px; display: flex; justify-content: center; align-items: center; overflow: hidden; border-radius: 50%; transition: 0.5s;">
                            <div
                                class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                <img class="rounded-circle img-fluid overflow-hidden"
                                    src="{{ $profeInfo->profile_photo_url }}" alt="{{ $profeInfo->role_id }}"
                                    width="150px" height="150px" />
                            </div>
                        </div>
                        <span class="fw-bold mt-4">{{ $profeInfo->nombre }} {{ $profeInfo->apellidos }}</span>
                        <span class="fw-bold text-primary mt-4">{{ $profeInfo->email }}</span>
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
                                                <a href="{{-- {{ $id->redes_sociales->link->github }} --}}" class="social m-3">
                                                    <span class="fa-brands fa-2x fa-github"></span>
                                                </a>
                                                {{-- si es linkedin --}}
                                                <a href="{{-- {{ $id->redes_sociales->link->linkedin }} --}}" class="social m-3">
                                                    <span class="fa-brands fa-2x fa-linkedin"></span>
                                                </a>
                                                {{-- si es discord --}}
                                                <a href="{{-- {{ $id->redes_sociales->link->discord }} --}}" class="social m-3">
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
                <div class="d-flex col-md-7 border-right m-2 align-items-center">
                    @if ($profeInfo->descripcion === null)
                        <div class="col-md-8">
                            <p class="h3 fw-bold text-decoration-underline">Descripción sobre el Profesor</p>
                            <div>
                                <p class="h6">Este profesor aún no a escrito nada sobre el</p>
                            </div>
                        </div>
                    @else
                        <div class="col-md-8">
                            <p class="h3 fw-bold text-decoration-underline">Descripción sobre el Profesor</p>
                            <div class="mt-4">
                                <p class="h6">{{ $profeInfo->descripcion }}</p>
                            </div>
                        </div>
                    @endif
                    <div class="row justify-content-evenly">
                        <div class="col-md-3">
                            <p class="h3 fw-bold text-decoration-underline">Idioma</p>
                            <div class="mt-4">
                                <p class="h6">{{ $profeInfo->idioma }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 container">
                    <div class="pb-3 px-5">
                        <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                            <h1 class="display-4 fw-normal">Precios</h1>
                        </div>
                    </div>
                    <div class="justify-content-center row row-cols-1 row-cols-md-3 text-center align-items-center">
                        @forelse ($profeInfo->courses as $course)
                            <div class="col">
                                    <div class="priEstContainer mb-4 rounded-3 shadow-sm text-light">
                                        <div class="card-header py-3">
                                <h4 class="my-0 fw-normal text-dark">{{ $course->nombrePack }}</h4>
                            </div>
                            <div class="card-body">
                                <p class="h1 card-title pricing-card-title my-3">
                                    {{ $course->precio }}<small>€</small>
                                </p>
                                <div>
                                    <p class="h3 mx-5 card-title pricing-card-title border-top border-dark my-3 pt-3">
                                        Ventajas:
                                    </p>
                                </div>
                                <ul class="list-unstyled mt-3 mb-4">
                                    <li>{{ $course->ventajaUno }}</li>
                                    @if ($course->ventajaDos !== null)
                                        <li>{{ $course->ventajaDos }}</li>
                                    @endif
                                    @if ($course->ventajaTres !== null)
                                        <li>{{ $course->ventajaTres }}</li>
                                    @endif
                                </ul>
                                @if ($course->id <= 2)
                                    <a href="{{ route('ordersstudent.createOrder', $profeInfo->id) }}">
                                        <button type="button" class="w-100 btn btn-lg btn-outline-dark fw-bold">
                                            Solicitar Servicio
                                        </button>
                                    </a>
                                @endif
                                @if ($course->id > 2)
                                    <a href="{{ route('ordersstudent.createOrder', $profeInfo->id) }}">
                                        <button type="button" class="w-100 btn btn-lg btn-dark fw-bold">
                                            Solicitar Servicio
                                        </button>
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="priEstContainer col-md-6 mb-5">
                            <div class="h-100 p-5 text-white rounded-3">
                                <h2 class="text-dark">Este profesor aun no a añadido Estudios realizados</h2>
                                <p class="fst-italic mb-0 text-dark fw-bold mt-4">Seguro que añadirá muy pronto...</p>
                            </div>
                        </div>
                    @endforelse
                {{-- <div class="col">
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
                                        <h1 class="card-title pricing-card-title">30€</h1>
                                        <ul class="list-unstyled mt-3 mb-4">
                                            <li>6h de clase</li>
                                            <li>Prioridad ante los demás</li>
                                            <li>Videos personalizados</li>
                                        </ul>
                                        <button type="button" class="w-100 btn btn-lg btn-primary">Solicitar
                                            Servicio</button>
                                    </div>
                                </div>
                            </div> --}}
            </div>
        </div>
    </div>
    <div>
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="pb-3 px-5">
                    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                        <h1 class="display-4 fw-normal">Estudios de Realizados</h1>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <!-- Single Product -->
                {{-- Inicio Bucle especialidades --}}
                @forelse ($profeInfo->studies as $study)
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-light m-3">
                            <div class="m-4">
                                <p class="card-caption h2 text-red">
                                    Licenciado en Matemáticas
                                </p>
                                <p class="mt-4">
                                    Nota Final:
                                </p>
                                <p class="text-center h1">{{ $study->nota }}</p>
                                <table class="mt-4 table table-bordered border-light table-dark">
                                    <thead>
                                        <th scope="col text-center">Inicio</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">{{ $study->fechaFinalizacion }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @empty
                <div class="priEstContainer text-center col-md-6 mb-5">
                    <div class="h-100 p-5 text-white rounded-3">
                        <h2 class="text-dark">Este profesor aun no a añadido Estudios realizados</h2>
                        <p class="fst-italic mb-0 text-dark fw-bold mt-4">Seguro que añadirá muy pronto...</p>
                    </div>
                </div>
                @endforelse
                {{-- Fin Bucle Especialidades --}}
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
