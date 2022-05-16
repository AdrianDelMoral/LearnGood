@extends('layout')
@section('titulo', 'Página Principal')
@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_inicio.css') }}">
@endsection
@section('cuerpo')
    <div class="container rounded bg-white mt-5 mb-5">
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
                        <div class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="rounded-circle img-fluid overflow-hidden" src="{{ $user->profile_photo_url }}" alt="{{ $user->role_id }}" width="150px" height="150px" />
                        </div>
                    </div>
                    <span class="fw-bold mt-4">{{ $user->nombre }} {{ $user->apellidos }}</span>
                    <span class="fw-bold text-primary mt-4">{{ $user->email }}</span>
                    {{-- inicio bucle redes sociales --}}
                <div class="div_socials d-flex flex-row align-items-center text-center mt-3">
                    {{-- si es github --}}
                    <a href="{{-- {{ $user->redes_sociales->link->github }} --}}" class="social m-3">
                        <span class="fa-brands fa-2x fa-github"></span>
                    </a>
                    {{-- si es linkedin --}}
                    <a href="{{-- {{ $user->redes_sociales->link->linkedin }} --}}" class="social m-3">
                        <span class="fa-brands fa-2x fa-linkedin"></span>
                    </a>
                    {{-- si es discord --}}
                    <a href="{{-- {{ $user->redes_sociales->link->discord }} --}}" class="social m-3">
                        <span class="fa-brands fa-2x fa-discord"></span>
                    </a>
                    {{-- si es facebook --}}
                    <a href="{{-- {{ $user->redes_sociales->link->facebook }} --}}" class="social m-3">
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
                <h2 class="">Precios</h2>
            </div>
            <div class="justify-content-center row row-cols-1 row-cols-md-3 mb-3 text-center align-items-center">
                {{-- Bucle de precios --}}
                    @if (isset($user->prices))
                        <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
                            <h2 class="h2 border-bottom">Este profesor aun no a creado precios</h2>
                                <p class="lead mb-0 fst-italic text-white">Seguro los creará pronto...</p>
                        </div>
                    @else
                        @foreach ($user->prices as $precio)
                            <div class="col">
                                @if ($precio->id <= 2)
                                    <div class="card mb-4 rounded-3 shadow-sm">
                                        <div class="card-header py-3">
                                @endif
                                @if ($precio->id > 2)
                                    <div class="card mb-4 rounded-3 shadow-sm border-primary">
                                        <div class="card-header py-3 text-white bg-primary border-primary">
                                @endif
                                            <h4 class="my-0 fw-normal">{{ $precio->nombrePack }}</h4>
                                        </div>
                                            <div class="card-body">
                                                <p class="h1 card-title pricing-card-title my-3"> {{ $precio->precio }}<small>€</small> </p>
                                                    <div>
                                                        <p class="h3 mx-5 card-title pricing-card-title border-top my-3 pt-3"> Ventajas: </p>
                                                    </div>
                                                        <ul class="list-unstyled mt-3 mb-4">
                                                            <li>{{ $precio->ventajaUno }}</li>
                                                            @if ($precio->ventajaDos !== null)
                                                                <li>{{ $precio->ventajaDos }}</li>
                                                            @endif
                                                            @if ($precio->ventajaTres !== null)
                                                                <li>{{ $precio->ventajaTres }}</li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                        @endforeach
                    @endif
            </div>
        </div>
    </div>
    {{-- Estudios de ingles --}}
    <div class="col-md-10 container">
        <div class="row justify-content-center text-center mb-5">
            <div class="col-md-8 col-lg-6">
                <div class="header">
                    <h2>Especialidades</h2>
                </div>
            </div>
        </div>

        @if (!isset($user->studies))
            <div class="p-4 p-md-5 mb-4 text-white rounded bg-dark">
                <h2 class="h2 border-bottom">Este profesor aun no a añadido estudios de sus niveles de ingles</h2>
                <p class="lead mb-0 fst-italic text-white">Seguro los añadirá pronto...</p>
            </div>
        @else
            <div class="row justify-content-center">
                <!-- Single Product -->
                @foreach ($user->studIES as $study)
                {{-- Inicio Bucle especialidades --}}
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-light m-3">
                        <div class="m-4">
                            <p class="card-caption h2 text-red">
                                Nivel: {{ $study->level->nombre }}
                            </p>
                            <p class="mt-4">
                                Nota Final:
                            </p>
                            <p class="text-center h1">{{ $study->nota }}</p>
                            <table class="mt-4 table table-bordered border-light table-dark">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col text-center">Fecha de Finalización</th>
                                    </tr>
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
                @endforeach
            </div>
        @endif
    </div>
    {{-- Fin Estudios de ingles --}}
    <div class="d-flex flex-wrap justify-content-center">
        <a href="/"><button class="btn btn-lg btn-primary my-5">Volver al Inicio</button></a>
    </div>
</div>
@endsection
