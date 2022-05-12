@extends('layout')
@section('titulo', 'Añadir un precio nuevo')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/precios.css') }}">
@endsection

@section('cuerpo')
    <div class="container mt-5">
        <div class="column row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
            @if ($comprobador->count() >= 3)
                <div class="col w-100">
                    <div class="card text-white bg-dark rounded-5 font-monospace">
                        <div class="m-5 p-5 h-100">
                            <div class="p-5">
                                <p class="h1 fw-bold text-danger text-center">No puedes crear mas de 3 precios</p>
                            </div>
                            <div class="container d-flex justify-content-center">
                                <a href="{{ route('precios.index') }}"><button
                                        class="btn btn-warning fw-bold mt-5 mb-5">Volver al listado de precios</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="container col-xxl-8 px-4 py-5">
                    <h1 class="fw-bold text-center">Añadir un nuevo Precio</h1>
                    <div class="d-flex justify-content-center">

                        <form action="{{ route('precios.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="labels" for="nombrePack">Nombre Pack</label>
                                <input type="string" class="form-control" name="nombrePack" id="nombrePack"
                                    placeholder="Nombre del Pack">
                                @error('nombrePack')
                                    <p class="form-text text-danger">{{ $mensaje }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="labels" for="precio">Precio</label>
                                <input type="number" class="form-control" name="precio" id="precio"
                                    aria-describedby="precioHelp" placeholder="Precio €">
                                @error('precio')
                                    <p class="form-text text-danger">{{ $mensaje }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="ventajaUno">Ventaja 1</label>
                                <input type="text" class="form-control" name="ventajaUno" id="ventajaUno"
                                    placeholder="Ventaja 1">
                                @error('precio')
                                    <p class="form-text text-danger">{{ $mensaje }}</p>
                                @enderror
                            </div>

                            @if ($comprobador->count() === 1)
                                <div class="form-group">
                                    <label for="ventajaDos">Ventaja 2</label>
                                    <input type="text" class="form-control" name="ventajaDos" id="ventajaUno"
                                        placeholder="Ventaja 1">
                                    @error('precio')
                                        <p class="form-text text-danger">{{ $mensaje }}</p>
                                    @enderror
                                </div>
                            @endif

                            @if ($comprobador->count() === 2)
                                <div class="form-group">
                                    <label for="ventajaTres">Ventaja 3</label>
                                    <input type="text" class="form-control" name="ventajaTres" id="ventajaUno"
                                        placeholder="Ventaja 1">
                                    @error('precio')
                                        <p class="form-text text-danger">{{ $mensaje }}</p>
                                    @enderror
                                </div>
                            @endif

                            <button class="btn w-100 btn-success mt-4">Crear Precio</button>
                        </form>

                    </div>
                </div>
                <div class="container">
                    <a href="{{ route('precios.index') }}"><button class="btn btn-primary mt-5 mb-5">Volver a
                            atrás</button></a>
                </div>
            @endif
        </div>
    </div>

@endsection
