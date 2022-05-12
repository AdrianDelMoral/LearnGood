@extends('layout')

@section('titulo', 'Página Principal')

@section('CSSadded')
    <link rel="stylesheet" href="{{ URL::asset('css/profesor/profesor_show.css') }}">
@endsection

@section('cuerpo')
    <div class="container mt-5 align-items-center">
        <div class="d-flex justify-content-center row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            <div class="">
                <div class="card text-white bg-dark rounded-5 font-monospace">
                    <div class="d-flex flex-column h-100 p-5">
                        <div class="d-flex justify-content-evenly align-items-center">
                            <span class="h1 fw-bold text-danger text-decoration-underline">{{ $price->nombrePack }}</span>
                        </div>
                        <div>
                            <span class="h3">Precio: {{ $price->precio }}€</span>
                        </div>
                        <div class="d-flex row text-left my-4">
                            <span class="h3">Ventajas:</span>
                            <div class="ms-3">
                                <ul class="fw-bold">
                                    <li type="1" class="ps-2 h5">{{ $price->ventajaUno }}</li>
                                    @if ($price->ventajaDos !== null)
                                        <li type="1" class="ps-2 h5">{{ $price->ventajaDos }}</li>
                                    @endif
                                    @if ($price->ventajaTres !== null)
                                        <li type="1" class="ps-2 h5">{{ $price->ventajaTres }}</li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card text-white bg-dark rounded-5 font-monospace">
            <div class="d-flex flex-column h-100 p-5">
                <div class="d-flex justify-content-evenly align-items-center">
                    <span class="h1 fw-bold text-danger text-decoration-underline">Nº {{ $price->nombrePack }}</span>
                    <span class="h3">- Precio: {{ $price->precio }}€</span>
                </div>
                <div class="d-flex row text-left my-4">
                    <span class="h3">Ventajas:</span>
                    <div class="ms-3">
                        <ul class="fw-bold">
                            <li type="1" class="ps-2 h5">{{ $price->ventajaUno }}</li>
                            @if ($price->ventajaDos == null)
                                <li type="1" class="ps-2 h5">{{ $price->ventajaDos }}</li>
                            @endif
                            @if ($price->ventajaTres == null)
                                <li type="1" class="ps-2 h5">{{ $price->ventajaTres }}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container d-flex justify-content-end">
        <a href="{{ route('precios.index') }}">
            <h1 class="btn btn-primary mt-5 mb-5">Siguiente</h1>
        </a>
    </div>
@endsection
