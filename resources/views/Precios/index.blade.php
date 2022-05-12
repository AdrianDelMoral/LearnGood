@extends('layout')
@section('titulo', 'Precios del Profesor')

@section('CSSadded')
    <!--Añadir css de esta vista -->
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/precios.css') }}">
@endsection

@section('cuerpo')
    <div class="container mt-5">
        <span class="h1">Precios de: {{ Auth::user()->nombre }}</span>
        <br>
        <span class="h3 text-primary fw-bold">Precios en total Actualmente: {{ $precios->count() }}</span>
        @if ($precios->count() === 0)
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                <div class="col w-100">
                    <div class="card text-white bg-dark rounded-5 font-monospace">
                        <div class="m-5 p-5 h-100">
                            <div class="p-5">
                                <p class="h1 fw-bold text-danger text-center">Aún no ha creado ningun pack de Precios</p>
                            </div>
                            <div class="text-center">
                                <a class="m-3 btn btn-success" href="{{ route('precios.create') }}">
                                    <span class="fas fa-plus"></span> Crear Precio
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            @if($precios->count() <= 3)
            <!-- Boon addPrice -->
                <a class="m-3 btn btn-success" href="{{ route('precios.create') }}">
                    <span class="fas fa-plus"></span> Crear Precio
                </a>
                <!-- Boton addPrice -->
            @endif
            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
                @foreach ($precios as $precio)
                    <div class="col d-flex align-items-center">
                        <div class="card text-white bg-dark rounded-5 font-monospace">
                            <div class="d-flex flex-column h-100 p-5">
                                <div class="d-flex justify-content-evenly align-items-center">
                                    <span class="h3 fw-bold text-danger text-decoration-underline">{{ $precio->nombrePack }}</span>
                                    <span class="h3">{{ $precio->precio }}€</span>
                                </div>
                                <div class="d-flex row text-left my-4">
                                    <span class="h3">Ventajas:</span>
                                    <div class="ms-3">
                                        <ul class="fw-bold">
                                            <li type="1" class="ps-2 h5">{{ $precio->ventajaUno }}</li>
                                            @if ($precio->ventajaDos !== null)
                                                <li type="1" class="ps-2 h5">{{ $precio->ventajaDos }}</li>
                                            @endif
                                            @if ($precio->ventajaTres !== null)
                                                <li type="1" class="ps-2 h5">{{ $precio->ventajaTres }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-evenly">
                                    <a href="{{ route('precios.show', $precio->id) }}">
                                        <button class="fas fa-eye btn btn-primary  mt-4 py-3 px-5"></button>
                                    </a>
                                    <a href="{{ route('precios.edit', $precio->id) }}">
                                        <button class="fas fa-edit btn btn-success mt-4 py-3 px-5"></button>
                                    </a>
                                    <button type="button" class="btn btn-danger mt-4 py-3 px-5 fas fa-trash"
                                        data-bs-toggle="modal" data-bs-target="#editModal">
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="editModal" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-content bg-dark border border-warning">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="editModalLabel">Eliminar Precio
                                                            </h5>
                                                            <i class="fa-regular fa-2xl fa-circle-xmark" type="button"
                                                                class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></i>
                                                        </div>
                                                    </div>
                                                    <div class="modal-body bg-dark">
                                                        <h1 class="text-danger my-5">Estas seguro de eliminar este precio?
                                                        </h1>
                                                    </div>
                                                    <div class="modal-footer bg-dark border border-warning ">
                                                        <form action="{{ route('precios.destroy', $precio->id) }}"
                                                            method="post" class="w-100">
                                                            @csrf
                                                            @method('delete')
                                                            <!-- Button trigger modal -->
                                                            <button type="submit" value="eliminar"
                                                                class="btn btn-danger w-100 py-3 px-5 fas fa-trash"></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- ubicacion para usar otros paginators a mano: vendor\laravel\framework\src\Illuminate\Pagination\resources\views\simple-bootstrap-5.blade.php --}}
        <div class="d-flex justify-content-center">
            @if ($precios->hasPages())
                <nav role="navigation" aria-label="Pagination Navigation">
                    <ul class="pagination">
                        {{-- Previous Page Link --}}
                        @if ($precios->onFirstPage())
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link">{!! __('X') !!}</span>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="bg-dark page-link text-light" href="{{ $precios->previousPageUrl() }}"
                                    rel="prev">
                                    {!! __('<span class="fa-solid fa-arrow-left"></span> Anterior') !!}
                                </a>
                            </li>
                        @endif

                        {{-- Next Page Link --}}
                        @if ($precios->hasMorePages())
                            <li class="page-item">
                                <a class="bg-dark page-link text-light" href="{{ $precios->nextPageUrl() }}"
                                    rel="next">{!! __('Siguiente <span class="fa-solid fa-arrow-right"></span>') !!}</a>
                            </li>
                        @else
                            <li class="page-item disabled" aria-disabled="true">
                                <span class="page-link">{!! __('X') !!}</span>
                            </li>
                        @endif
                    </ul>
                </nav>
            @endif
        </div>
        {{-- ubicacion para usar otros paginators a mano: vendor\laravel\framework\src\Illuminate\Pagination\resources\views\simple-bootstrap-5.blade.php --}}

        <a href="/"><button class="btn btn-primary mt-3 mb-5">Volver a Inicio</button></a>
    </div>

@endsection
@section('JSadded')
@endsection
