@extends('layout')
@section('titulo', 'Añadir un precio nuevo')

@section('CSSadded') {{-- Añadir css de esta vista --}}
    <link rel="stylesheet" href="{{ URL::asset('css/alumno/precios.css') }}">
@endsection

@section('cuerpo')
    <div class="container col-xxl-8 px-4 py-5">
        <h1 class="fw-bold text-center">Editar Precio Nº {{ $price->precio }}</h1>
        <div class="d-flex justify-content-center">

            <form action="{{ route('precios.store') }}" method="post">
                @csrf
                <div class="form-group">
                    <label class="labels" for="precio">Precio</label>
                    <input type="number" class="form-control" name="precio" id="precio" aria-describedby="precioHelp"
                        placeholder="Precio €" value="{{ $price->precio }}">
                    @error('precio')
                        <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ventajaUno">Ventaja 1</label>
                    <input type="text" class="form-control" name="ventajaUno" id="ventajaUno" placeholder="Ventaja 1" value="{{ $price->ventajaUno }}">
                    @error('ventajaUno')
                        <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ventajaUno">Ventaja 2</label>
                    <input type="text" class="form-control" name="ventajaDos" id="ventajaUno" placeholder="Ventaja 1" value="{{ $price->ventajaDos }}">
                    @error('ventajaUno')
                        <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="ventajaUno">Ventaja 3</label>
                    <input type="text" class="form-control" name="ventajaTres" id="ventajaUno" placeholder="Ventaja 1" value="{{ $price->ventajaTres }}">
                    @error('ventajaUno')
                        <p class="form-text text-danger">{{ $message }}</p>
                    @enderror
                </div>

                <button class="btn w-100 btn-success mt-4">Editar Precio</button>
                <a href="{{ route('precios.index') }}">
                    <button class="btn btn-secondary mt-5 mb-5">Cancelar edicion</button>
                </a>
            </form>

        </div>
    </div>
    <div class="container">
        <a href="{{ route('precios.index') }}"><button class="btn btn-primary mt-5 mb-5">Volver a atrás</button></a>
    </div>
@endsection
