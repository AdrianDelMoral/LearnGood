@extends('layout')
@section('titulo', 'Precios del Profesor')

@section('CSSadded')
    <!--Añadir css de esta vista -->
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/precios.css') }}">
@endsection

@section('cuerpo')

    <div class="container mt-5">
        <span class="h1">Precios de: {{ Auth::user()->nombre }}</span>
        <!-- Modal Crear Precio -->
        <div class="modal fade" id="addPriceModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <ul id="save_msgList"></ul>

                        <div class="form-group mb-3">
                            <label for="">Precio</label>
                            <input type="text" required class="precio form-control">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Horas</label>
                            <input type="text" required class="horas form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary add_price">Crear</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal Crear Precio -->
        <!-- Boton addPrice -->
        @if ($precios)
            <button type="button" class="m-3 btn btn-success" data-bs-toggle="modal" data-bs-target="#addPriceModal">
                <span class="fas fa-plus"></span> Crear Precio
            </button>
        @endif
        <!-- Boton addPrice -->

        <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            @if ($precios)
                <div class="col">
                    <div class="card text-white bg-dark rounded-5 font-monospace">
                        <div class="d-flex flex-column h-100 p-5">
                            <div class="d-flex row justify-content-evenly align-items-center text-center">
                                <span class="h1 fw-bold text-danger mb-5">Aún No Hay Precios</span>
                                <a href="" class="btn btn-success">
                                    <span class="fas fa-plus"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                @foreach ($precios as $precio)
                    <tr>
                        <th scope="row" class="text-center alitgn-items-center h6">{{ $precio->id }}</th>
                        <td class="text-center alitgn-items-center">{{ $precio->precio }}</td>
                        <td class="text-center alitgn-items-center">{{ $precio->ventajaUno }}</td>
                        <td class="text-center alitgn-items-center">{{ $precio->ventajaDos }}</td>
                        <td class="text-center alitgn-items-center">{{ $precio->ventajaTres }}</td>
                        <td class="text-center alitgn-items-center">
                            <a href="" class="btn btn-success">
                                <span class="fas fa-edit"></span>
                            </a>
                        </td>
                        <td class="text-center alitgn-items-center">
                            <a href="" class="btn btn-danger">
                                <span class="fas fa-trash"></span>
                            </a>
                        </td>
                    </tr>
                    <div class="col">
                        <div class="card text-white bg-dark rounded-5 font-monospace">
                            <div class="d-flex flex-column h-100 p-5">
                                <div class="d-flex justify-content-evenly align-items-center">
                                    <span class="h1 fw-bold text-danger text-decoration-underline">Nº
                                        1{{-- {{ $precio->id }} --}}</span>
                                    <span class="h3">- Precio: {{-- {{ $precio->precio }} --}}30€</span>
                                </div>
                                <div class="d-flex row text-left my-4">
                                    <span class="h3">Ventajas:</span>
                                    <div class="ms-3">
                                        <ul class="fw-bold">
                                            <li type="1" class="ps-2 h5">{{-- {{ $precio->ventajaUno }} --}}Yo que se de ventaja
                                            </li>
                                            <li type="1" class="ps-2 h5">{{-- {{ $precio->ventajaDos }} --}}Yo que se de </li>
                                            <li type="1" class="ps-2 h5">{{-- {{ $precio->ventajaTres }} --}}Yo que se de </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-evenly">
                                    <a href="" class="btn btn-success mt-4 px-5">
                                        <span class="fas fa-edit"></span>
                                    </a>
                                    <a href="" class="btn btn-danger mt-4 px-5">
                                        <span class="fas fa-trash"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

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

        <a href="/"><button class="btn btn-primary mt-3 mb-5">Volver a atrás</button></a>
    </div>







@endsection
@section('JSadded')
    {{-- Ajax/FronValidation de Precios --}}
    <script src="{{ asset('js/profesor/precios.js') }}"></script>
    {{-- Ajax/FronValidation de Precios --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
@endsection
